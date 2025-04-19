<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                    <div class="d-flex flex-column">
                        <h4><?php echo e(get_phrase('System Settings')); ?></h4>

                    </div>
                    <div class="export-btn-area">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
        <div class="col-7">
            <div class="eSection-wrap-2">
                <div class="row">
                    <div class="col-md-12 col-md-12 col-sm-12">
                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block"
                                action="<?php echo e(route('admin.system.settings.view.save')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="fpb-7">
                                    <label for="system_name" class="eForm-label"><?php echo e(get_phrase('System Name')); ?>

                                    </label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($system_name); ?>"
                                        id="system_name" name="system_name" required="">
                                </div>
                                <div class="fpb-7">
                                    <label for="system_title" class="eForm-label"><?php echo e(get_phrase('System Title')); ?>

                                    </label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($system_title); ?>"
                                        id="system_title" name="system_title" required="">
                                </div>
                                <div class="fpb-7">
                                    <label for="system_email"
                                        class="eForm-label"><?php echo e(get_phrase('System Email')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($system_email); ?>"
                                        id="system_email" name="system_email" required="">
                                </div>
                                <div class="fpb-7">
                                    <label for="system_phone"
                                        class="eForm-label"><?php echo e(get_phrase('System Phone')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($system_phone); ?>"
                                        id="system_phone" name="system_phone" required="">
                                </div>
                                <div class="fpb-7">
                                    <label for="system_fax" class="eForm-label"><?php echo e(get_phrase('System Fax')); ?></label>
                                    <input type="text" class="form-control eForm-control"
                                        value="<?php echo e($system_fax); ?>" id="system_fax" name="system_fax">
                                </div>
                                <div class="fpb-7">
                                    <label for="system_address" class="eForm-label"><?php echo e(get_phrase('Address')); ?></label>
                                    <input type="text" class="form-control eForm-control"
                                        value="<?php echo e($system_address); ?>" id="system_address" name="system_address"
                                        required="">
                                </div>

                                <div class="fpb-7">
                                    <label for="system_currency"
                                        class="eForm-label"><?php echo e(get_phrase('System currency')); ?></label>
                                    <select class="form-select select2" name="system_currency" id="system_currency">
                                        <?php $__currentLoopData = DB::table('currencies')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($currency->code); ?>" <?php if (get_settings('system_currency') == $currency->code) {
                                                echo 'selected';
                                            } ?>>
                                                <?php echo e($currency->code); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="system_language"
                                        class="eForm-label"><?php echo e(get_phrase('System language')); ?></label>
                                    <select class="form-select select2" name="system_language" id="system_language">
                                        <?php $__currentLoopData = DB::table('languages')->select('name')->groupBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option class="text-capitalize" value="<?php echo e($language->name); ?>"
                                                <?php if (get_settings('system_language') == $language->name) {
                                                    echo 'selected';
                                                } ?>><?php echo e(ucfirst($language->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="system_address"
                                        class="eForm-label"><?php echo e(get_phrase('Public signup')); ?></label>
                                    <select class="form-select eForm-control select2" name="public_signup">
                                        <option value="1" <?php if (get_settings('public_signup') == 1) {
                                            echo 'selected';
                                        } ?>><?php echo e(get_phrase('enabled')); ?></option>
                                        <option value="0" <?php if (get_settings('public_signup') != 1) {
                                            echo 'selected';
                                        } ?>><?php echo e(get_phrase('disabled')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="ad_charge_per_day"
                                        class="eForm-label"><?php echo e(get_phrase('Ad charge per day')); ?>(<?php echo e(currency('')); ?>)</label>
                                    <input type="number" step="0.01" class="form-control eForm-control"
                                        value="<?php echo e(get_settings('ad_charge_per_day')); ?>" id="ad_charge_per_day"
                                        name="ad_charge_per_day">
                                </div>

                                <div class="fpb-7">
                                    <label for="system_footer" class="eForm-label"><?php echo e(get_phrase('Footer')); ?></label>
                                    <input type="text" class="form-control eForm-control"
                                        value="<?php echo e($system_footer); ?>" id="system_footer" name="system_footer"
                                        required="">
                                </div>
                                <div class="fpb-7">
                                    <label for="system_footer_link" class="eForm-label">
                                        <?php echo e(get_phrase('Footer Link')); ?></label>
                                    <input type="text" class="form-control eForm-control"
                                        value="<?php echo e($system_footer_link); ?>" id="system_footer_link"
                                        name="system_footer_link">
                                </div>

                                
                                <div class="fpb-7">
                                    <label for="google_analytics_id" class="eForm-label">
                                        <?php echo e(get_phrase('Google Analytics Id')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="google_analytics_id"
                                        value="<?php echo e($google_analytics_id); ?>" name="google_analytics_id">
                                </div>

                                <div class="fpb-7">
                                    <label for="hugging_face_auth_key" class="eForm-label">
                                        <?php echo e(get_phrase('Hugging Face Auth Key')); ?> <a href="https://huggingface.co/" target="_blank" title="<?php echo e(get_phrase('Get Hugging Face Auth Key')); ?>"> <i class="fa-solid fa-link"></i></label></a>
                                    <input type="text" class="form-control eForm-control" id="hugging_face_auth_key"
                                        value="<?php echo e($hugging_face_auth_key); ?>" name="hugging_face_auth_key">
                                </div>

                                
                                <div class="fpb-7">
                                    <label for="meta_pixel_id" class="eForm-label">
                                        <?php echo e(get_phrase('Footer Link')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="meta_pixel_id"
                                        value="<?php echo e($meta_pixel_id); ?>" name="meta_pixel_id">
                                </div>

                                

                                <div class="fpb-7">
                                    <label for="meta_pixel_id" class="eForm-label">
                                        <?php echo e(get_phrase('Commission on Paid content')); ?></label>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="commission_rate">%</span>
                                        <input type="number" class="form-control eForm-control"
                                            placeholder="Commission rate in percentage" aria-label="commission_rate"
                                            aria-describedby="commission_rate" name="commission_rate" min="1"
                                            max="100"
                                            <?php if($commission_rate != ''): ?> value="<?php echo e($commission_rate); ?>" <?php endif; ?>>
                                    </div>
                                </div>

                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form"><?php echo e(get_phrase('Update')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="eSection-wrap-2">
                <div class="row">
                    <div class="eForm-layouts">
                        <form method="POST" enctype="multipart/form-data" class="d-block"
                            action="<?php echo e(route('admin.product.update')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="fpb-7">
                                <label for="system_name" class="eForm-label"><?php echo e(get_phrase('Product Update')); ?>

                                </label>
                                <input class="form-control eForm-control-file" id="formFileSm" type="file"
                                    name="file">
                            </div>
                            <div class="fpb-7 pt-2">
                                <button type="submit" class="btn-form"><?php echo e(get_phrase('Update')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 mt-5">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <p class="column-title"><?php echo e(get_phrase('SYSTEM LOGO')); ?></p>
                        <div class="eForm-file">
                            <form method="POST" action="<?php echo e(route('admin.system.settings.logo.view.save')); ?>"
                                enctype="multipart/form-data" class="d-block">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <label class="col-form-label"
                                            for="example-fileinput"><?php echo e(get_phrase('Dark logo')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(get_system_logo_favicon($system_dark_logo, 'dark')); ?>"
                                                class="mx-4 my-5" width="200px" alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" id="formFileSm"
                                                    type="file" name="dark_logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label class="col-form-label"
                                            for="example-fileinput"><?php echo e(get_phrase('Light logo')); ?></label>
                                        <div class="eCard d-block text-center bg-secondary">
                                            <img src="<?php echo e(get_system_logo_favicon($system_light_logo, 'light')); ?>"
                                                class="mx-4 my-5" width="200px" alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" id="formFileSm"
                                                    type="file" name="light_logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label class="col-form-label"
                                            for="example-fileinput"><?php echo e(get_phrase('Favicon')); ?></label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="<?php echo e(get_system_logo_favicon($system_fav_icon, 'favicon')); ?>"
                                                class="mx-4 my-5" width="53px" height="60px" alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" id="formFileSm"
                                                    type="file" name="favicon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-form"><?php echo e(get_phrase('Update Logo')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .box{
            height: 70px;
            width: 100%;
            border-radius: 3px ;
            display: inline-block;
            margin-bottom: -3px;
        }
        .eLabel {
            padding: 4px 0;
            background: transparent;
            margin-bottom: 10px;
            font-size: 14px;
            border-radius: 3px;
            color: #000;
            border: 1px solid #5431EF;
            transition: .5s;
            cursor: pointer;
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .eLabel:hover{
            background: #5431EF;
            color: #fff;
        }
        .active_color .default,
        .active_color .active1,
        .active_color .active2,
        .active_color .active3,
        .active_color .active4,
        .active_color .active5,
        .active_color .active6,
        .active_color .active7,
        .active_color .active8,
        .active_color .active9,
        .active_color .active10,
        .active_color .active11,
        .active_color .active112{
            color: #fff;
            border: none;
        }
        .active_color .default,
        .box-one{
            background: #5431EF;
        }
        .active_color .active1,
        .box-one{
            background: #5431EF;
        }
        .active_color .active2,
        .box-two{
            background: #0766FF;
        }
        .active_color .active3,
        .box-three{
            background: #C64D53;
        }
        .active_color .active4,
        .box-four{
            background: #FF9702;
        }
        .active_color .active5,
        .box-five{
            background: #029487;
        }
        .active_color .active6,
        .box-six{
            background: #F34135;
        }
        .active_color .active7,
        .box-seven{
            background: #E91D62;
        }
        .active_color .active8,
        .box-eight{
            background: #5F7C8C;
        }
        .active_color .active9,
        .box-nine{
            background: #4BAF4F;
        }
        .active_color .active10,
        .box-ten{
            background: #9C26B0;
        }
        .active_color .active11,
        .box-eleven{
            background: #D4BF00;
        }
        .active_color .active12,
        .box-twelve{
            background: #F92FC0;
        }
    </style>

    <div class="col-12 mt-5">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <p class="column-title"><?php echo e(get_phrase('SYSTEM Theme Color')); ?></p>
                        <div class="eForm-file">
                            <div class="row active_color">
                                <?php
                                  $storedColor = App\Models\Setting::where('type', 'theme_color')->value('description');
                               ?>
                                <div class="col-md-2 text-center">
                                    <span class="box box-one"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'default'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'default' ?  'default': ''); ?>">
                                        <?php echo e(get_phrase('Default')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-two"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-2'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-2' ?  'active2': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                
                                <div class="col-md-2 text-center">
                                    <span class="box box-three"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-3'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-3' ?  'active3': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-four"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-4'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-4' ?  'active4': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-five"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-5'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-5' ?  'active5': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-six"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-6'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-6' ?  'active6': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-seven"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-7'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-7' ?  'active7': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-eight"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-8'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-8' ?  'active8': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-nine"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-9'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-9' ?  'active9': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-ten"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-10'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-10' ?  'active10': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-eleven"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-11'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-11' ?  'active11': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="box box-twelve"></span>
                                    <a href="<?php echo e(route('admin.system.settings.color.save', ['themeColor' => 'color-12'])); ?>" class="col-form-label eLabel <?php echo e($storedColor == 'color-12' ?  'active12': ''); ?>">
                                        <?php echo e(get_phrase('Active')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script>
    $(document).ready(function(){
  $("button").click(function(){
    $("p").toggle();
  });
});
</script><?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/backend/admin/setting/system.blade.php ENDPATH**/ ?>