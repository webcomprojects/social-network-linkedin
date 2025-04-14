@php
    $model = $payment_details['success_method']['model_name'];
    
    if ($model == 'AuthorPayout' || $model == 'CampaignPayout') {
        $payment_keys = DB::table('users')
            ->where('id', $payment_details['custom_field']['user_id'])
            ->value('payment_settings');
    
        $keys = json_decode($payment_keys);
    
        if ($keys->flutterwave_live) {
            $key_type = 'secret_key';
            $key = $keys->flutterwave_secret_key;
        } else {
            $key_type = 'public_key';
            $key = $keys->flutterwave_public_key;
        }
    
        if ($key == '') {
            $msg = "This payment gateway isn't configured.";
        }
    
        if ($model == 'AuthorPayout') {
            $title = 'Authors payout.';
            $description = 'Authors payout.';
        } elseif ($model == 'CampaignPayout') {
            $title = 'Campaign Payout.';
            $description = 'Campaign Payout.';
        }
    } elseif ($model == 'Sponsor' || $model == 'Subscription' || $model == 'Donation' || $model == 'Job') {
        $payment_keys = json_decode($payment_gateway->keys, true);
        $key = $key_type = '';
    
        if ($payment_keys != '') {
            if ($payment_gateway->status == 1) {
                if ($payment_gateway->test_mode == 1) {
                    $key_type = 'public_key';
                    $key = $payment_keys['public_key'];
                } else {
                    $key_type = 'secret_key';
                    $key = $payment_keys['secret_key'];
                }
                if ($key == '') {
                    $msg = "This payment gateway isn't configured.";
                }
            } else {
                $msg = 'Admin denied transaction through this gateway.';
            }
        } else {
            $msg = "This payment gateway isn't configured.";
        }
    
        if ($model == 'Sponsor') {
            $title = 'Ads payment.';
            $description = 'Payment for ads publish.';
        } elseif ($model == 'Subscription') {
            $title = 'Subscription.';
            $description = 'Payment for subscription.';
        } elseif ($model == 'Donation') {
            $title = 'Donation.';
            $description = 'Payment for donation.';
        }elseif ($model == 'Job') {
            $title = 'Job.';
            $description = 'Payment for Job.';
        }
    }
    
    // user information
    $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();
@endphp

@if ($key != '')
    <form id="makePaymentForm">
        <input type="hidden" id="user_name" name="user_name" value="{{ $user->name }}">
        <input type="hidden" id="email" name="email" value="{{ $user->email }}">
        <input type="hidden" id="phone" name="phone" value="{{ $user->phone }}">
        <input type="hidden" id="amount" name="amount" value="{{ $payment_details['items'][0]['price'] }}">
        <input type="hidden" id="key" name="key" value="{{ $key }}">
        <input type="submit" class="btn btn-primary py-2" value="Pay by Flutterwave">

    </form>
@else
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div class="payment_err_msg">
            <b>Opps!</b> {{ $msg }}<br>
            Try another gateway.
        </div>
    </div>
@endif


<script>
    $(function() {
        $('#makePaymentForm').submit(function(e) {
            e.preventDefault();
            var name = $('#user_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var amount = $('#amount').val();
            var key = $('#key').val();
            var key_type = "{{ $key_type }}";
            var title = "{{ $title }}";
            var description = "{{ $description }}";

            makePayment(name, email, phone, amount, key, key_type, title, description);
        });
    });


    function makePayment(name, email, phone, amount, key, key_type, title, description) {
        FlutterwaveCheckout({
            public_key: key,
            tx_ref: "RX1_{{ substr(rand(0, time()), 0, 7) }}",
            amount: amount,
            currency: "USD",
            payment_options: "card, banktransfer, ussd",

            redirect_url: "{{ route('payment.success', ['identifier' => 'flutterwave']) }}",

            customer: {
                email: email,
                phone_number: phone,
                name: name,
            },

            customizations: {
                title: title,
                description: description,
            },
        });
    }
</script>
