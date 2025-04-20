
<div class="main_content">
	<!-- Mani section header and breadcrumb -->
	<div class="mainSection-title">
		<div class="row">
			<div class="col-12">
				<div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
					<div class="d-flex flex-column">
						<h4><?php echo e(get_phrase('Payment gateways')); ?></h4>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Start Admin area -->
	<div class="row">
		<div class="col-md-7">
			<div class="eSection-wrap-2">

	            <div class="col-md-12">

                    <h4 class="header-title mb-3"><p><?php echo e($payment_gateway->title); ?> <?php echo e(get_phrase('Settings')); ?></p></h4>
                    <form class="" action="<?php echo e(route('admin.payment_gateway.update', $payment_gateway->id)); ?>" method="post" enctype="multipart/form-data">
                    	<?php echo csrf_field(); ?>

                        <div class="form-group mb-3">
                            <label class="eForm-label"><?php echo e(get_phrase('Select currency')); ?></label>
                            <select class="form-control eForm-control select2" data-toggle="select2" name="currency" required>
                                <option value=""><?php echo e(get_phrase('Select currency')); ?></option>
                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($currency->code); ?>" <?php if($payment_gateway->currency == $currency->code): ?> Selected <?php endif; ?>>
                                        <?php echo e($currency->code); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
                            </select>
                        </div>


                        <?php foreach(json_decode($payment_gateway['keys'], true) as $key => $value): ?>
                        	<div class="form-group mb-3">
                                <?php if($key == 'theme_color'): ?>
                                    <label class="text-capitalize eForm-label"><?php echo e(get_phrase(str_replace('_', ' ', $key))); ?></label>
                                    <input type="color" name="<?php echo $key; ?>" class="form-control eForm-control" value="<?php echo $value;?>" required />
                                <?php else: ?>
                                        <label class="text-capitalize eForm-label"><?php echo e(get_phrase(str_replace('_', ' ', $key))); ?></label>
                                        <input type="text" name="<?php echo $key; ?>" class="form-control eForm-control" value="<?php echo $value;?>" required />
                                <?php endif; ?>
                        	</div>
                        <?php endforeach; ?>

                        <div class="row">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><?php echo e(get_phrase('Save changes')); ?></button>
                            </div>
                        </div>
                    </form>

	            </div>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/backend/admin/payment/payment_gateway_edit.blade.php ENDPATH**/ ?>