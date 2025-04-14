<div class="timeline-carousel px-3 bg-white owl-carousel">
    <!--  avatar end -->
    <a href="#" class="story-entry story-entry-details active" onclick="loadSingleStoryDetailsOnModal('<?php echo e($story_details->story_id); ?>', this)">
        <div class="avatar-online d-flex align-items-center mb-2">
            <div class="avatar-img"> <img src="<?php echo e(get_user_image($story_details->photo, 'optimized')); ?>" alt="">
            </div>
            <div class="avatar-info ms-2">
                <h4 class="ava-nave"><?php echo e($story_details->name); ?></h4>
                <div class="activity-time small-text text-muted"><?php echo e(date_formatter($story_details->created_at, 2)); ?></div>
            </div>
        </div>
    </a><!--  avatar end -->

    <?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--  avatar end -->
        <a href="#" class="story-entry story-entry-details" onclick="loadSingleStoryDetailsOnModal('<?php echo e($story->story_id); ?>', this)">
            <div class="avatar-online d-flex align-items-center mb-2">
                <div class="avatar-img"> <img src="<?php echo e(get_user_image($story->photo, 'optimized')); ?>" alt="">
                </div>
                <div class="avatar-info ms-2">
                    <h4 class="ava-nave"><?php echo e($story->name); ?></h4>
                    <div class="activity-time small-text text-muted"><?php echo e(date_formatter($story->created_at, 2)); ?></div>
                </div>
            </div>
        </a><!--  avatar end -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div> <!-- Online Status End -->


<div class="stg-wrap" id="stg-wrap-story-gallery">
    <div class="story-gallery owl-carousel">
        <div class="st-item">
            <div class="carousel-inner mb-5">
                <div class="stc-wrap">
                    <div class="st-child-gallery stc-bg owl-carousel" onclick="player.togglePlay(toggle)">
                        <?php if($story_details->content_type == 'text'): ?>
                            <?php
                                $text_info = json_decode($story_details->description, true);
                            ?>
                            <div class="stories-view mt-3 py-4" style="color: <?php echo '#'.$text_info['color']; ?>; background-color: <?php echo '#'.$text_info['bg-color']; ?>;">
                                <?php echo e($text_info['text']); ?>

                            </div>  
                        <?php else: ?>
                            <?php $media_files = DB::table('media_files')->where('story_id', $story_details->story_id)->get(); ?>
                            <?php $__currentLoopData = $media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($media_file->file_type == 'video'): ?>
                                    <?php if(File::exists('public/storage/story/videos/'.$media_file->file_name)): ?>
                                        <video class="plyr-js" width="100%" autoplay controlsList="nodownload">
                                            <source src="<?php echo e(asset('storage/story/videos/'.$media_file->file_name)); ?>" type="">
                                        </video>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img class="w-100" src="<?php echo e(asset('storage/story/images/'.$media_file->file_name)); ?>">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Owl Carousel End -->
</div><?php /**PATH /home3/kigbvjze/linkdin.webcomdemo.ir/resources/views/frontend/story/story_details.blade.php ENDPATH**/ ?>