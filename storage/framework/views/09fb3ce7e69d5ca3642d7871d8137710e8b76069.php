
    <?php
    $blockedByUser = DB::table('block_users')->where('user_id', auth()->user()->id)->pluck('block_user')->toArray();
    // $blockedByOthers = DB::table('block_users')->where('block_user', auth()->user()->id)->pluck('user_id')->toArray();
    ?>
    
    <?php $__currentLoopData = $friendships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friendship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($friendship->requester == $user_info->id): ?>
        <?php $friends_user_data = DB::table('users')->where('id', $friendship->accepter)->first(); ?>
    <?php else: ?>
        <?php $friends_user_data = DB::table('users')->where('id', $friendship->requester)->first(); ?>
    <?php endif; ?>

    <?php
    $number_of_friend_friends = json_decode($friends_user_data->friends);
    $number_of_my_friends = json_decode($user_info->friends);

    if(!is_array($number_of_friend_friends)) $number_of_friend_friends = array();
    if(!is_array($number_of_my_friends)) $number_of_my_friends = array();

    if($friends_user_data->id==auth()->user()->id){
        continue;
    }

    $number_of_mutual_friends = count(array_intersect($number_of_friend_friends, $number_of_my_friends));
    
    //  User Block
    if (in_array($friends_user_data->id , $blockedByUser)) {
        continue;
    }
    // if (in_array($friendship->requester, $blockedByOthers)) {
    //     continue;
    // }
   
    ?>

        <div class="col-lg-6">
            <div class="single-item-countable d-flex friend-item align-items-center justify-content-between mb-3">
                <div class="n_request_control">
                     <div class="d-flex align-items-center w-100">
                         <!-- Avatar -->
                         <div class="avatar">
                             <a href="<?php echo e(route('user.profile.view',$friends_user_data->id)); ?>"><img class="avatar-img rounded-circle user_image_show_on_modal" src="<?php echo e(get_user_image($friends_user_data->photo, 'optimized')); ?>" alt="" height="40" width="40"></a>
                         </div>
                         <div class="avatar-info ms-2">
                             <h6><a href="<?php echo e(route('user.profile.view',$friends_user_data->id)); ?>"><?php echo e($friends_user_data->name); ?></a></h6>
                             <div class="activity-time small-text text-muted"> <?php echo e($number_of_mutual_friends); ?> <?php echo e(get_phrase('Mutual Friends')); ?></div>
                         </div>
                     </div>
                     <div class="post-controls dropdown dotted">
                         <a class="dropdown-toggle" href="#" id="navbarDropdown"
                             role="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <?php
                                 $friend_id = $friends_user_data->id;
                                 $follow = \App\Models\Follower::where('user_id',auth()->user()->id)->where('follow_id',$friend_id)->count();
                             ?>
                             <?php if($follow>0): ?>
                                     <li><a class="dropdown-item" href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfollow',$friend_id); ?>')"><?php echo e(get_phrase('Unfollow')); ?></a></li>
                                 <?php else: ?>
                                     <li><a class="dropdown-item" href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.follow',$friend_id); ?>')"><?php echo e(get_phrase('Follow')); ?></a> </li>
                             <?php endif; ?>
                             <li> <a class="dropdown-item" href="javascript:void(0)" onclick="confirmAction('<?php echo route('user.unfriend', $friend_id); ?>', true)"><?php echo e(get_phrase('Unfriend')); ?></a> </li>
                         </ul>
                     </div>
                </div>
           </div>
        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   <?php /**PATH /Applications/MAMP/htdocs/Sociopro_2.6/Sociopro/resources/views/frontend/profile/friends_single_data.blade.php ENDPATH**/ ?>