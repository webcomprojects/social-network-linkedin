<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white radius-8 p-3">
    <div class="search_left">
        <h3><?php echo e(get_phrase('Friends')); ?></h3>
     </div>
   
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel"
            aria-labelledby="home-tab">
            <div id="" class="friends-list mt-3">

                <?php echo $__env->make('frontend.user.single_user.friends_single_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <!-- Tab Pane End -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="friends-request my-3 g-2">
                <div id="" class="row">

                    <?php echo $__env->make('frontend.user.single_user.friend_requests_single_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>
            </div>
        </div>
        <!-- Tab Pane End -->
    </div>
    <!-- Tab Content End -->
</div>
<!-- Friends Tab End --><?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/frontend/user/single_user/friends.blade.php ENDPATH**/ ?>