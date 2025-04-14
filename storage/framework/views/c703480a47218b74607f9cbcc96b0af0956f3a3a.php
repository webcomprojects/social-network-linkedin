<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white radius-8 p-3">
    <div class="n_friend_search">
        <div class="search_left">
           <h3><?php echo e(get_phrase('Friends')); ?></h3>
           
        </div>
      
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                aria-selected="true"><?php echo e(get_phrase('My Friends')); ?></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#profile" type="button" role="tab"
                aria-controls="profile" aria-selected="false"><?php echo e(get_phrase('Friend Requests')); ?></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="add_friend-tab" data-bs-toggle="tab"
                data-bs-target="#add_friend" type="button" role="tab"
                aria-controls="add_friend" aria-selected="false"><?php echo e(get_phrase('Find Friends')); ?></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="block_friend-tab" data-bs-toggle="tab"
                data-bs-target="#block_friend" type="button" role="tab"
                aria-controls="block_friend" aria-selected="false"><?php echo e(get_phrase('Block List')); ?></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="followers-tab" data-bs-toggle="tab"
                data-bs-target="#followers" type="button" role="tab"
                aria-controls="followers" aria-selected="false"><?php echo e(get_phrase('Followers')); ?></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="following-tab" data-bs-toggle="tab"
                data-bs-target="#following" type="button" role="tab"
                aria-controls="following" aria-selected="false"><?php echo e(get_phrase('Following')); ?></button>
        </li>
        
    </ul>
 </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel"
            aria-labelledby="home-tab">
            <div id="my-friends-list" class="friends-list mt-3">
                   
                  <div class="row">
                     <?php echo $__env->make('frontend.profile.friends_single_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
               
            </div>
        </div>
        <!-- Tab Pane End -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="friends-request my-3 g-2">
                <div id="my-friend-request-list" class="row">

                    <?php echo $__env->make('frontend.profile.friend_requests_single_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>
            </div>
        </div>
        <!-- Tab Pane End -->
        <!-- Tab Pane End -->
        <div class="tab-pane fade" id="add_friend" role="tabpanel" aria-labelledby="add_friend-tab">
            <div class="friends-request my-3 g-2">
                <div id="my-friend-request-list" class="row">

                    <?php echo $__env->make('frontend.profile.add_friend_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>
            </div>
        </div>
        <!-- Tab Pane End -->
        <!-- Tab Pane End -->
        <div class="tab-pane fade" id="block_friend" role="tabpanel" aria-labelledby="block_friend-tab">
            <div class="friends-request my-3 g-2">
                <div id="my-friend-request-list" class="row">

                    <?php echo $__env->make('frontend.profile.block_friend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>
            </div>
        </div>
        <!-- Tab Pane End -->
        <div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="followers-tab">
            <div class="friends-request my-3 g-2">
                <div id="my-friend-request-list" class="row">
                    <?php echo $__env->make('frontend.profile.followers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
            <div class="friends-request my-3 g-2">
                <div id="my-friend-request-list" class="row">
                    <?php echo $__env->make('frontend.profile.following', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Tab Content End -->
</div>
<!-- Friends Tab End --><?php /**PATH /home3/kigbvjze/linkdin.webcomdemo.ir/resources/views/frontend/profile/friends.blade.php ENDPATH**/ ?>