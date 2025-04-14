<div class="stg-wrap" id="stg-wrap-story-gallery">
    <div class="story-gallery owl-carousel">
        <div class="st-item">
            <div class="carousel-inner mb-5">
                <div class="stc-wrap">
                    <div class="st-child-gallery stc-bg owl-carousel">
                        
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
</div><?php /**PATH /home3/kigbvjze/linkdin.webcomdemo.ir/resources/views/frontend/story/single_story_details.blade.php ENDPATH**/ ?>