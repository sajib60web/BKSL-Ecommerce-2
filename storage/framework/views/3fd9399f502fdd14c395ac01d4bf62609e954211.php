<?php $__env->startSection('title', 'Category'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/shop_responsive.css">

<div class="home">
    <?php if(isset($category_name->category_name)): ?>
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo e(asset($category_name->image)); ?>"></div>
    <?php endif; ?>
    <?php if(isset($category_name->image)): ?>
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo e(asset($category_name->image)); ?>"></div>
    <?php endif; ?>
    
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <?php if(isset($category_name->category_name)): ?>
            <h2 class="home_title"><?php echo e($category_name->category_name); ?></h2>
        <?php endif; ?>
        <?php if(isset($category_name->sub_category_name)): ?>
            <h2 class="home_title"><?php echo e($category_name->sub_category_name); ?></h2>
        <?php endif; ?>
        <?php if(isset($brand_name->brand_name)): ?>
            <h2 class="home_title"><?php echo e($brand_name->brand_name); ?></h2>
        <?php endif; ?>
    </div>
</div>

<!-- Shop -->
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <!-- <?php if(isset($sub_categories)): ?> -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">Sub Categories</div>
                        <ul class="sidebar_categories">
                            <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(URL::to('/view-product-by-subCategory/'.$subCategory->id)); ?>"><?php echo e($subCategory->sub_category_name); ?></a></li>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!-- <?php endif; ?> -->
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 58%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 58%;"></span>
                            </div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly="" style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>

                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="brand"><a href="<?php echo e(URL::to('/view-product-by-brand/'.$brand->id)); ?>"><?php echo e($brand->brand_name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Shop Content -->
                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>Product : </span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_grid">
                        <div class="product_grid_border"></div>
                        <!-- Product Item -->
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(URL::to('/product-view-by-id/'.$product->id)); ?>">
                            <div class="product_item is_new" style="float: left;">
                                <div class="product_border"></div>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->id == $image->product_id): ?>
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo e(asset($image->medium_image)); ?>" alt=""></div>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="product_content">
                                    <div class="product_price">৳ <?php echo e($product->sale_Price); ?></div>
                                    <div class="product_name">
                                        <div>
                                            <a href="<?php echo e(URL::to('/product-view-by-id/'.$product->id)); ?>" tabindex="0"><?php echo e(str_limit($product->product_name_eng, 20)); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_fav">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </a>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- End Product Item -->
                    </div>
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('/customTemplate')); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('/customTemplate')); ?>/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo e(asset('/customTemplate')); ?>/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="<?php echo e(asset('/customTemplate')); ?>/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo e(asset('/customTemplate')); ?>/js/shop_custom.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>