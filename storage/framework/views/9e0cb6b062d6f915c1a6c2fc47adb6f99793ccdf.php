
<div class="profile-wrap">
    <div class="profile-cover  bg-white">
        <div class="profile-header" style="background-image: url('<?php echo e(get_cover_photo($user_info->cover_photo)); ?>');">
           <div class="cover-btn-group">
                <button
                onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.profile.edit_profile'])); ?>', '<?php echo e(get_phrase('Edit your profile')); ?>');"
                class="edit-cover btn " data-bs-toggle="modal" data-bs-target="#edit-profile"><i
                    class="fa fa-pencil"></i><?php echo e(get_phrase('Edit Profile')); ?></button>
                <button  onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.profile.edit_cover_photo'])); ?>', '<?php echo e(get_phrase('Update your cover photo')); ?>');"
                    class="edit-cover btn n_edit"><i class="fa fa-camera"></i><?php echo e(get_phrase('Edit Cover Photo')); ?></button>
            </div>
        </div>
            <div class="n_profile_tab">
                 <div class="n_main_tab">
                    <div class="profile-avatar d-flex align-items-center">
                        <div class="avatar avatar-xl"><img class="rounded-circle"
                                src="<?php echo e(get_user_image($user_info->photo, 'optimized')); ?>" alt=""></div>
                        <div class="avatar-details">
                            <?php
                                $user_name = \App\Models\Users::where('id', auth()->user()->id)->first()->name;
                            ?>


                            <div class="badge_info d-flex justify-content-center align-items-center gap-1 mt-3">
                                <h4 class="m-0 pr-2"><?php echo e(auth()->user()->name); ?></h4>
                                <?php 
                                    $currentDate = \Carbon\Carbon::now();
                                    $badge_info = \App\Models\Badge::where('user_id', auth()->user()->id)
                                    ->whereDate('start_date', '<=', $currentDate)
                                    ->whereDate('end_date', '>=', $currentDate)
                                    ->first();
                                ?>
                                <?php if($badge_info?->status == '1' && $badge_info->start_date <= now() && $badge_info->end_date >= now()): ?>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.1825 1.16051C11.5808 0.595046 12.4192 0.595047 12.8175 1.16051L13.8489 2.62463C14.1272 3.01962 14.648 3.15918 15.0865 2.95624L16.7118 2.20397C17.3395 1.91343 18.0655 2.33261 18.1277 3.02149L18.2889 4.80515C18.3324 5.28634 18.7137 5.66763 19.1948 5.71111L20.9785 5.87226C21.6674 5.9345 22.0866 6.66054 21.796 7.28825L21.0438 8.91352C20.8408 9.35198 20.9804 9.87284 21.3754 10.1511L22.8395 11.1825C23.405 11.5808 23.405 12.4192 22.8395 12.8175L21.3754 13.8489C20.9804 14.1272 20.8408 14.648 21.0438 15.0865L21.796 16.7118C22.0866 17.3395 21.6674 18.0655 20.9785 18.1277L19.1948 18.2889C18.7137 18.3324 18.3324 18.7137 18.2889 19.1948L18.1277 20.9785C18.0655 21.6674 17.3395 22.0866 16.7117 21.796L15.0865 21.0438C14.648 20.8408 14.1272 20.9804 13.8489 21.3754L12.8175 22.8395C12.4192 23.405 11.5808 23.405 11.1825 22.8395L10.1511 21.3754C9.87284 20.9804 9.35198 20.8408 8.91352 21.0438L7.28825 21.796C6.66054 22.0866 5.9345 21.6674 5.87226 20.9785L5.71111 19.1948C5.66763 18.7137 5.28634 18.3324 4.80515 18.2889L3.02149 18.1277C2.33261 18.0655 1.91343 17.3395 2.20397 16.7117L2.95624 15.0865C3.15918 14.648 3.01962 14.1272 2.62463 13.8489L1.16051 12.8175C0.595046 12.4192 0.595047 11.5808 1.16051 11.1825L2.62463 10.1511C3.01962 9.87284 3.15918 9.35198 2.95624 8.91352L2.20397 7.28825C1.91343 6.66054 2.33261 5.9345 3.02149 5.87226L4.80515 5.71111C5.28634 5.66763 5.66763 5.28634 5.71111 4.80515L5.87226 3.02149C5.9345 2.33261 6.66054 1.91343 7.28825 2.20397L8.91352 2.95624C9.35198 3.15918 9.87284 3.01962 10.1511 2.62463L11.1825 1.16051Z"
                                            fill="#329CE8" />
                                        <path d="M7.5 11.83L10.6629 14.9929L17 8.66705" stroke="white" stroke-width="1.67647"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                <?php endif; ?>
    
                            </div>



                            <?php if(auth()->user()->profile_status == 'lock'): ?>
                            <span class="lock_shield"><i class="fa-solid fa-shield"></i> <?php echo e(get_phrase('You locked your profile')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="n_tab_follow ">
                        <?php
                        $friends = DB::table('friendships')
                            ->where(function ($query) {
                                $query->where('accepter', Auth()->user()->id)->orWhere('requester', Auth()->user()->id);
                            })
                            ->where('is_accepted', 1)
                            ->orderBy('friendships.importance', 'desc');
                    ?>
                        
                        
                    </div>
                 </div>
                <nav class="profile-nav">
                    <ul class="nav align-items-center justify-content-start">
                        <li class="nav-item <?php if(Route::currentRouteName() == 'profile'): ?> active <?php endif; ?>"><a
                                href="<?php echo e(route('profile')); ?>" class="nav-link"><?php echo e(get_phrase('Timeline')); ?></a></li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'profile.friends'): ?> active <?php endif; ?>"><a
                                href="<?php echo e(route('profile.friends')); ?>" class="nav-link"><?php echo e(get_phrase('Friends')); ?></a>
                        </li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'profile.photos' || Route::currentRouteName() == 'album.details.list'): ?> active <?php endif; ?>"><a
                                href="<?php echo e(route('profile.photos')); ?>" class="nav-link"><?php echo e(get_phrase('Photo')); ?></a>
                        </li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'profile.videos'): ?> active <?php endif; ?>"><a
                                href="<?php echo e(route('profile.videos')); ?>" class="nav-link"><?php echo e(get_phrase('Video')); ?></a>
                        </li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'profile.savePostList'): ?> active <?php endif; ?>"><a
                                href="<?php echo e(route('profile.savePostList')); ?>" class="nav-link"><?php echo e(get_phrase('Saved Posts')); ?></a>
                        </li>
                        <li class="nav-item <?php if(Route::currentRouteName() == 'profile.checkins_list'): ?> active <?php endif; ?>">
                            <div class="post-controls dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(get_phrase('More')); ?>

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li>
                                        <a class="dropdown-item"  href="<?php echo e(route('profile.checkins_list')); ?>"> <?php echo e(get_phrase('Check-ins')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </li>
                    </ul>


                    <div class="post-controls dropdown dotted profile_tab_set">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <?php if(auth()->user()->profile_status == 'lock'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('profile.profileUnlock')); ?>"> <i class="fa-solid fa-lock-open"></i><?php echo e(get_phrase('UnLock Profile')); ?>

                                </a>
                                <?php else: ?>
                                <a class="dropdown-item"  href="<?php echo e(route('profile.profileLock')); ?>"> <i class="fa-solid fa-lock"></i><?php echo e(get_phrase('lock Profile')); ?>

                                </a>
                                <?php endif; ?>
                            </li>  
                           
                        </ul>
                    </div>
                </nav>
            </div>
        
    </div>
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-12 col-sm-12">
                
                <?php if(Route::currentRouteName() == 'profile.friends'): ?>
                    <?php echo $__env->make('frontend.profile.friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif(Route::currentRouteName() == 'profile.photos'): ?>
                    <?php echo $__env->make('frontend.profile.photos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                <?php elseif(Route::currentRouteName() == 'album.details.list'): ?>
                    <?php echo $__env->make('frontend.profile.single_album_list_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php elseif(Route::currentRouteName() == 'profile.videos'): ?>
                    <?php echo $__env->make('frontend.profile.videos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php elseif(Route::currentRouteName() == 'profile.savePostList'): ?>
                    <?php echo $__env->make('frontend.profile.savePostList', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php elseif(Route::currentRouteName() == 'profile.checkins_list'): ?>
                    <?php echo $__env->make('frontend.profile.checkins_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php else: ?>
                    <?php echo $__env->make('frontend.main_content.create_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div id="profile-timeline-posts">
                        <?php echo $__env->make('frontend.main_content.posts', ['type' => 'user_post'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <!-- COL END -->
            
        </div>
    </div>
    <!-- Profile content End -->
</div>

<?php echo $__env->make('frontend.profile.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/frontend/profile/index.blade.php ENDPATH**/ ?>