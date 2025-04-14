
                
<div class="marketplace-wrap">
    <div class="product-form  mb-3 bg-white p-3 pb-12 radius-8">
        <div class="nm_place d-flex pagetab-head  align-items-center justify-content-between">
            <h3 class="h5"><span><i class="fa-solid fa-calendar-days"></i></span> <?php echo e(get_phrase('Marketplace')); ?></h3>
            <div class="">
                    <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.marketplace.create_product'])); ?>', '<?php echo e(get_phrase('Create Product')); ?>');" class="btn common_btn" data-bs-toggle="modal" data-bs-target="#createProduct"> <i class="fa fa-plus-circle"></i><?php echo e(get_phrase('create')); ?></a>
                <a href="<?php echo e(route('userproduct')); ?>" class="btn common_btn  mx-1"><?php echo e(get_phrase('My Products')); ?></a>
                <a href="<?php echo e(route('product.saved')); ?>" class="btn common_btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo e(get_phrase('Saved Product')); ?>"><?php echo e(get_phrase('Saved')); ?></a>
            </div>
        </div>
        
        <div class="product-filter market-filter mt-3">
            
            <form method="GET" action="<?php echo e(route('filter.product')); ?>" class=" row">
                <div class="form-group mb-12">
                    <input type="search" class="submit_on_enter inputs " name="search" value="<?php if(isset($_GET['search']) && $_GET['search']!="" ): ?><?php echo e($_GET['search']); ?><?php endif; ?>" class="bg-secondary rounded" placeholder="Type To Search">
                </div>
                <h3 class="sub-title"><?php echo e(get_phrase('Filters')); ?></h3>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group ">
                            <select name="condition" class="" onchange="this.form.submit()">
                                <option value=""  selected><?php echo e(get_phrase('Condition')); ?></option>
                                <option value="used" <?php if(isset($_GET['condition']) && $_GET['condition']!=""): ?><?php echo e($_GET['condition']=='used'?"selected" :""); ?><?php endif; ?> ><?php echo e(get_phrase('Used')); ?></option>
                                <option value="new" <?php if(isset($_GET['condition']) && $_GET['condition']!=""): ?><?php echo e($_GET['condition']=='new'?"selected" :""); ?><?php endif; ?> ><?php echo e(get_phrase('New')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 gm-2">
                        <div class="form-group ">
                            <input type="number" class="submit_on_enter pl-18" value="<?php if(isset($_GET['min']) && $_GET['min']!="" ): ?><?php echo e($_GET['min']); ?><?php endif; ?>" name="min" placeholder="min">
                        </div>
                    </div>
                    <div class="col-md-4 gm-2">
                        <div class="form-group ">
                            <input type="number" class="submit_on_enter pl-18" value="<?php if(isset($_GET['max']) && $_GET['max']!="" ): ?><?php echo e($_GET['max']); ?><?php endif; ?>" name="max" placeholder="max">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group ">
                            <input type="text" name="location" class="submit_on_enter pl-18" value="<?php if(isset($_GET['location']) && $_GET['location']!="" ): ?><?php echo e($_GET['location']); ?><?php endif; ?>"  placeholder="Location">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!--  Product Form End -->
    <!-- Product Listing Start -->
    <div class="product-listing bg-white radius-8 p-20 ">
        <?php if(count($products)>0): ?>
        <div class="row g-3" id="<?php if(str_contains(url()->current(), '/productdata')): ?> single-item-countable <?php endif; ?>">
            <?php echo $__env->make('frontend.marketplace.product-single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php else: ?>
        <div class="no_data j_nodata mt-3 bg-white radius-8 p-20">
            <div class="no_data_img eData">
                <span><svg width="1447" height="1374" viewBox="0 0 1447 1374" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_60_31)">
                    <rect x="376" y="70" width="884" height="166" rx="83" fill="#EDEDED"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M43 429.5C43 348.038 109.038 282 190.5 282H1280.5C1361.96 282 1428 348.038 1428 429.5C1428 510.962 1361.96 577 1280.5 577H1239.98C1202.84 607.718 1179.55 651.899 1179.55 701C1179.55 755.127 1207.85 803.275 1251.8 834H1284.5C1374.25 834 1447 906.754 1447 996.5C1447 1086.25 1374.25 1159 1284.5 1159H186.5C96.7537 1159 24 1086.25 24 996.5C24 906.754 96.7537 834 186.5 834H219.402C263.353 803.275 291.657 755.127 291.657 701C291.657 651.899 268.365 607.718 231.23 577H190.5C109.038 577 43 510.962 43 429.5Z" fill="#EDEDED"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M289.939 1052.15L290.909 1044.72L291.879 1037.28C295.512 1037.75 299.224 1038 303 1038H317.833V1045.5V1053H303C298.573 1053 294.214 1052.71 289.939 1052.15ZM822.167 1053V1045.5V1038H837C840.776 1038 844.488 1037.75 848.121 1037.28L849.091 1044.72L850.061 1052.15C845.786 1052.71 841.427 1053 837 1053H822.167ZM875.279 1045.41L872.406 1038.48L869.533 1031.56C876.435 1028.69 882.885 1024.94 888.739 1020.45L893.308 1026.39L897.878 1032.34C890.997 1037.63 883.409 1042.04 875.279 1045.41ZM916.34 1013.88L910.393 1009.31L904.446 1004.74C908.945 998.885 912.694 992.435 915.556 985.533L922.484 988.406L929.412 991.279C926.041 999.409 921.628 1007 916.34 1013.88ZM317.833 201H303C298.573 201 294.214 201.288 289.939 201.845L290.909 209.282L291.879 216.719C295.512 216.245 299.224 216 303 216H317.833V208.5V201ZM264.721 208.588L267.594 215.516L270.467 222.444C263.565 225.306 257.115 229.055 251.261 233.554L246.692 227.607L242.122 221.66C249.003 216.372 256.591 211.959 264.721 208.588ZM223.66 240.122L229.607 244.692L235.554 249.262C231.055 255.115 227.306 261.565 224.444 268.467L217.516 265.594L210.588 262.721C213.959 254.591 218.372 247.003 223.66 240.122ZM203 938.182H210.5H218V953C218 956.776 218.245 960.488 218.719 964.121L211.282 965.091L203.845 966.061C203.288 961.786 203 957.427 203 953V938.182ZM210.588 991.279L217.516 988.406L224.444 985.533C227.306 992.435 231.055 998.885 235.554 1004.74L229.607 1009.31L223.66 1013.88C218.372 1007 213.959 999.409 210.588 991.279ZM264.721 1045.41L267.594 1038.48L270.467 1031.56C263.565 1028.69 257.115 1024.94 251.261 1020.45L246.692 1026.39L242.122 1032.34C249.003 1037.63 256.591 1042.04 264.721 1045.41ZM203 908.545H210.5H218V878.909H210.5H203V908.545ZM203 849.273H210.5H218V819.636H210.5H203V849.273ZM203 790H210.5H218V760.364H210.5H203V790ZM203 730.727H210.5H218V701.091H210.5H203V730.727ZM203 671.455H210.5H218V641.818H210.5H203V671.455ZM203 612.182H210.5H218V582.545H210.5H203V612.182ZM203 552.909H210.5H218V523.273H210.5H203V552.909ZM203 493.636H210.5H218V464H210.5H203V493.636ZM203 434.364H210.5H218V404.727H210.5H203V434.364ZM203 375.091H210.5H218V345.455H210.5H203V375.091ZM203 315.818H210.5H218V301C218 297.224 218.245 293.512 218.719 289.879L211.282 288.909L203.845 287.939C203.288 292.214 203 296.573 203 301V315.818ZM347.5 201V208.5V216H377.167V208.5V201H347.5ZM406.833 201V208.5V216H436.5V208.5V201H406.833ZM466.167 201V208.5V216H495.833V208.5V201H466.167ZM525.5 201V208.5V216H555.167V208.5V201H525.5ZM584.833 201V208.5V216H614.5V208.5V201H584.833ZM644.167 201V208.5V216H673.833V208.5V201H644.167ZM937 464H929.5H922V493.636H929.5H937V464ZM937 523.273H929.5H922V552.909H929.5H937V523.273ZM937 582.545H929.5H922V612.182H929.5H937V582.545ZM937 641.818H929.5H922V671.455H929.5H937V641.818ZM937 701.091H929.5H922V730.727H929.5H937V701.091ZM937 760.364H929.5H922V790H929.5H937V760.364ZM937 819.636H929.5H922V849.273H929.5H937V819.636ZM937 878.909H929.5H922V908.545H929.5H937V878.909ZM937 938.182H929.5H922V953C922 956.776 921.755 960.488 921.281 964.121L928.718 965.091L936.155 966.061C936.712 961.786 937 957.427 937 953V938.182ZM792.5 1053V1045.5V1038H762.833V1045.5V1053H792.5ZM733.167 1053V1045.5V1038H703.5V1045.5V1053H733.167ZM673.833 1053V1045.5V1038H644.167V1045.5V1053H673.833ZM614.5 1053V1045.5V1038H584.833V1045.5V1053H614.5ZM555.167 1053V1045.5V1038H525.5V1045.5V1053H555.167ZM495.833 1053V1045.5V1038H466.167V1045.5V1053H495.833ZM436.5 1053V1045.5V1038H406.833V1045.5V1053H436.5ZM377.167 1053V1045.5V1038H347.5V1045.5V1053H377.167ZM680 220L689.917 229.917L700.523 219.31L690.607 209.393L680 220ZM709.75 249.75L729.583 269.583L740.19 258.977L720.357 239.143L709.75 249.75ZM749.417 289.417L769.25 309.25L779.857 298.643L760.023 278.81L749.417 289.417ZM789.083 329.083L808.917 348.917L819.523 338.31L799.69 318.477L789.083 329.083ZM828.75 368.75L848.583 388.583L859.19 377.977L839.357 358.143L828.75 368.75ZM868.417 408.417L888.25 428.25L898.857 417.643L879.023 397.81L868.417 408.417ZM908.083 448.083L918 458L928.607 447.393L918.69 437.477L908.083 448.083Z" fill="#B2B2B2"/>
                    <rect x="940" y="990.288" width="59" height="101" transform="rotate(-40.4621 940 990.288)" fill="#C6C6C6"/>
                    <path d="M1052.77 1005.76C1061.28 998.714 1073.89 999.894 1080.94 1008.4L1281.52 1250.43C1299.14 1271.69 1296.19 1303.21 1274.93 1320.83L1248.75 1342.53C1227.49 1360.15 1195.97 1357.2 1178.35 1335.94L977.762 1093.9C970.714 1085.4 971.895 1072.79 980.399 1065.74L1052.77 1005.76Z" fill="#B2B2B2"/>
                    <rect x="1058.63" y="1053.51" width="21.4981" height="265.241" rx="10.7491" transform="rotate(-40.19 1058.63 1053.51)" fill="white"/>
                    <circle cx="752" cy="718" r="354" fill="#E6E6E6" stroke="#B2B2B2" stroke-width="10"/>
                    <circle cx="752" cy="718" r="280" fill="white" stroke="#B2B2B2" stroke-width="10"/>
                    <path d="M839.656 650.125C839.656 656.766 838.484 662.951 836.141 668.68C833.667 674.279 830.542 679.422 826.766 684.109C822.99 688.797 818.823 693.094 814.266 697C811.922 698.953 809.643 700.841 807.43 702.664C805.216 704.357 803.003 706.049 800.789 707.742C796.362 710.997 792.26 714.057 788.484 716.922C784.839 719.656 782.104 722.26 780.281 724.734C779.5 725.776 778.589 727.404 777.547 729.617C776.505 731.701 775.984 734.109 775.984 736.844C775.984 743.875 773.771 749.669 769.344 754.227C765.047 758.784 758.276 761.062 749.031 761.062C739.135 761.062 731.974 758.328 727.547 752.859C723.12 747.391 720.906 741.531 720.906 735.281C720.906 726.688 722.404 719.266 725.398 713.016C728.393 707.026 732.169 701.883 736.727 697.586C741.284 693.159 746.167 689.318 751.375 686.062C757.104 682.417 761.987 679.031 766.023 675.906C770.581 672.391 774.357 668.484 777.352 664.188C780.346 659.76 781.844 654.292 781.844 647.781C781.844 639.708 780.281 633.589 777.156 629.422C774.031 625.255 770.06 622.456 765.242 621.023C760.555 619.591 755.672 618.875 750.594 618.875C738.745 618.875 730.867 621.74 726.961 627.469C723.185 633.198 721.297 640.099 721.297 648.172C721.297 657.547 718.107 664.578 711.727 669.266C705.477 673.953 698.901 676.297 692 676.297C683.146 676.297 675.984 673.888 670.516 669.07C665.047 664.122 662.312 657.807 662.312 650.125C662.312 646.609 662.703 642.247 663.484 637.039C664.266 631.701 665.763 626.036 667.977 620.047C670.19 614.057 673.315 608.068 677.352 602.078C681.258 596.349 686.531 590.945 693.172 585.867C699.682 581.049 707.625 577.143 717 574.148C726.375 571.154 737.573 569.656 750.594 569.656C765.307 569.656 778.198 571.674 789.266 575.711C800.464 579.617 809.773 585.086 817.195 592.117C832.169 606.44 839.656 625.776 839.656 650.125ZM782.625 814.578C782.625 825.646 779.826 833.849 774.227 839.188C768.628 844.396 760.75 847 750.594 847C728.979 847 718.172 836.193 718.172 814.578C718.172 803.38 720.971 795.242 726.57 790.164C732.169 785.086 740.177 782.547 750.594 782.547C761.401 782.547 769.409 785.086 774.617 790.164C779.956 795.242 782.625 803.38 782.625 814.578Z" fill="#B2B2B2"/>
                    <path d="M47.5322 74L137.462 169.256" stroke="#B2B2B2" stroke-width="15" stroke-linecap="round"/>
                    <path d="M186.532 24L187.008 154.999" stroke="#B2B2B2" stroke-width="15" stroke-linecap="round"/>
                    <path d="M0 216.019L130.994 217.237" stroke="#B2B2B2" stroke-width="15" stroke-linecap="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_60_31">
                    <rect width="1447" height="1374" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg></span>
                <p class="pera_text"><?php echo e(get_phrase('No data found!')); ?></p>
                <p class="pera_text"><?php echo e(get_phrase('Please go back')); ?></p>
                <a class="btn_1" href="<?php echo e(url()->previous()); ?>"><?php echo e(get_phrase('Back')); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>





<?php $__env->startSection('specific_code_niceselect'); ?>
    $('select').niceSelect();
<?php $__env->stopSection(); ?>



<?php /**PATH /Applications/MAMP/htdocs/Sociopro_2.6/Sociopro/resources/views/frontend/marketplace/products.blade.php ENDPATH**/ ?>