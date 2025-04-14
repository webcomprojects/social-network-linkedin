@php
    $model = $payment_details['success_method']['model_name'];
    
    if ($model == 'AuthorPayout' || $model == 'CampaignPayout') {
        $payment_keys = DB::table('users')
            ->where('id', $payment_details['custom_field']['user_id'])
            ->value('payment_settings');
    
        $keys = json_decode($payment_keys);
    
        $public_key = $keys->raz_key_id;
        $secret_key = $keys->raz_secret_key;
    
        if ($public_key == '' || $secret_key == '') {
            $msg = "This payment gateway isn't configured.";
        }
    } elseif ($model == 'Sponsor' || $model == 'Subscription' || $model == 'Donation' || $model == 'Job' || 'Badge' ) {
        $payment_gateway = DB::table('payment_gateways')
            ->where('identifier', 'razorpay')
            ->first();
        $public_key = $secret_key = '';
    
        if ($payment_gateway->keys != '') {
            if ($payment_gateway->status == 1) {
                $keys = json_decode($payment_gateway->keys, true);
                $public_key = $keys['public_key'];
                $secret_key = $keys['secret_key'];
    
                if ($public_key == '' || $secret_key == '') {
                    $msg = "This payment gateway isn't configured.";
                }
            } else {
                $msg = 'Admin denied transaction through this gateway.';
            }
        } else {
            $msg = "This payment gateway isn't configured.";
        }
    }
    
@endphp

@if ($public_key != '' && $secret_key != '')
    <form action="{{ route('razorpay.order', $payment_gateway->identifier) }}" method="post">
        @csrf
        <input type="hidden" name="price" value="{{ $payment_details['items'][0]['price'] }}">
        <button type="submit" class="btn btn-primary">Pay by Razorpay</button>
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
