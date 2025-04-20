<?php
 if (addon_status('fundraiser') == 1){
    $fundraiser = DB::table('fundraisers')
        ->where('user_id', auth()->user()->id)
        ->exists();
    
    $donate = DB::table('fundraiser_donations')
        ->where('doner_id', auth()->user()->id)
        ->exists();
    }
?>
<style>
    .ac-con{
        margin-left: 10px !important; 
    }
    .res_funrai .btn_1 {  
	margin-right: 20px;
  }
  .over{
    overflow: hidden;
  }
</style>

<div class="main-section over mt-0">
    
        <div class="row">
            

            <div class="col-lg-12 col-xl-12">

                <div class=" row">
                    <div
                        class=" <?php if($section_title == ''): ?> col-6 d-flex align-items-center <?php else: ?> col-12 <?php endif; ?>">
                        <div class="toggle-menu">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                    

                    <?php if(Route::currentRouteName() !== 'creator.payout'): ?>
                        <?php if(Route::currentRouteName() !== 'user.settings'): ?>
                            <?php if(addon_status('fundraiser') == 1): ?>
                            <div class="bg-white radius-8 p-20 mb-12  blog-type res_funrai ac-con">
                                <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text_16 mb-0"><?php echo e(get_phrase('Fundraiser')); ?></h3>
                                <a href="<?php echo e(route('fundraiser.create')); ?>" class="btn_1"><?php echo e(get_phrase('Create Campaign')); ?></a>
                                </div>
                                <div class="gr-search mt-3">
                                    <form action="<?php echo e(route('fundraiser.search')); ?>" class="ag_form" method="GET">
                                        <input type="text" id="search" name="search" class="bg-secondary rounded"
                                        placeholder="Search" value="<?php echo e(request('search')); ?>" placeholder="search here...">
                                        <span class="i fa fa-search"></span>
                                    </form>
                            </div>
                                <ul class="Etab d-flex">
                                    <li><a href="<?php echo e(route('fundraiser.index')); ?>" class="<?php if(Route::currentRouteName() == 'fundraiser.index'): ?> actives <?php else: ?>  <?php endif; ?>"><?php echo e(get_phrase('Campaign')); ?></a></li>
                                    <?php if($fundraiser || $donate): ?>
                                    <li>  
                                        <a href="<?php if($fundraiser): ?> <?php echo e(route('fundraiser.myactivity')); ?> <?php else: ?>
                                            <?php echo e(route('fundraiser.donor')); ?> <?php endif; ?>" class="<?php if(Route::currentRouteName() == 'fundraiser.myactivity'): ?> actives <?php endif; ?>"><?php echo e(get_phrase(' My Activity')); ?> </a>
                                    </li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(route('fundraiser.payment')); ?>" class="<?php if(Route::currentRouteName() == 'fundraiser.payment' || Route::currentRouteName() == 'campaign.history'): ?> actives <?php endif; ?>"><?php echo e(get_phrase('Payment')); ?></a></li>
                                    <li><a href="<?php echo e(route('fundraiser.category', ['type' => 'explore'])); ?>" class="<?php if(Route::currentRouteName() == 'fundraiser.category'): ?> actives <?php else: ?>  <?php endif; ?>" ><?php echo e(get_phrase('Category')); ?></a></li>
                                </ul>
                            </div>   
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>


                    
                </div>

                
                <?php echo $__env->make($content_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    
</div>
<?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/frontend/addons/index.blade.php ENDPATH**/ ?>