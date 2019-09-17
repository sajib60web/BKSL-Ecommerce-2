<?php $__env->startSection('title', 'Product Details'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/product_responsive.css">

<div class="single_product">
    <div class="container">
        <div class="row">
            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-image="<?php echo e(asset($image->large_image)); ?>">
                        <img src="<?php echo e(asset($image->medium_image)); ?>" alt="Image">
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="<?php echo e(asset($image->large_image)); ?>" alt=""></div>
            </div>
            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category"><?php echo e($mainCategory->category_name); ?> / <?php echo e($subCategory->sub_category_name); ?><span style="float: right"> <strong>View : <?php echo e($product->view_total); ?></strong></span></div>
                    <div class="product_name">৳ <?php echo e($product->sale_Price); ?></div>
                    <h4>Deal Code : <?php echo e($product->id); ?></h4>
                    <style>
                        .checked {
                          color: orange;
                        }
                    </style>
                    <div class="rating_r rating_r_4 product_rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="product_text">
                        <p><?php echo e($product->product_short_description_eng); ?></p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <?php echo e(Form::open(['url'=> '/add-to-cart', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

                            <div class="clearfix" style="z-index: 1000;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_quantity clearfix">
                                            <span style="color: black">Quantity: </span>
                                            <input id="quantity_input" name="product_qty" type="text" pattern="[0-9]*" value="1" min="1">
                                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" onclick="indsdald()" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                            </div>
                                        </div>
                                        <script>
                                        function indsdald() {
                                            var qt = $('#quantity_input').val();
                                            if (qt >= <?php echo e($product->product_qty - 1); ?>){
                                                $('#quantity_input').val('<?php echo e($product->product_qty - 1); ?>');
                                            }
                                        }
                                    </script>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0; padding: 0;">Size : <?php echo e($product->size); ?></p>
                                        <p style="margin: 0; padding: 0;">Others : <?php echo e($product->others); ?></p>
                                    </div>
                                    <!-- Product Color -->
                                </div>
                            </div>
                            <!-- Product Quantity -->
                            <br/>
                            <div class="product_category"><span style="font-size: 20px; font-weight: 600">৳ <?php echo e($product->product_price_eng); ?> </span> <strong> | </strong> <?php echo e($product->note_eng); ?> </div><br />
                            <div class="row" style="margin: 0">
                                <div class="social-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($url)); ?>" target="_blank">
                                        <i style="color: #1da1f2" class="fab fa-3x fa-facebook-square"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($url)); ?>" target="_blank">
                                        <i style="color: #1da1f2" class="fab fa-3x fa-twitter-square"></i>
                                    </a>
                                    <a href="https://plus.google.com/share?url=<?php echo e(urlencode($url)); ?>" target="_blank">
                                        <i style="color: #dd5144" class="fab fa-3x fa-google-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                            <br />
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="button_container">
                                <button type="submit" name="btn" value="addToCart" class="button cart_button " style="font-size: 12px">Add to Cart</button>
                                <button type="submit" name="btn" value="orderNow" class="button cart_button " style="background-color: red; font-size: 12px">Order Now</button>
                                <a href="<?php echo e(URL::to('/cart')); ?>" class="button cart_button" style="background-color: #0a8f08; font-size: 12px">Cart Page</a>
                            </div>
                            <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header"><h3>Product Details</h3></div>
                    <div class="card-body" style="text-align: justify">
                       <p><?php echo $product->prodcut_long_description_eng; ?></p>
                    </div>
                </div><br/>
                <div class="card">
                    
                    <div class="card-body" style="text-align: justify; background-color: #f7f7f7">
                        <p><?php echo $info->custom_description_eng; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header"><h4 style="text-align: center"><?php echo e($shopper->user_name); ?></h4></div>
                    <div class="card-body" style="background-image: linear-gradient(0deg,#fff 0%,#17a2b8);">
                        <div style="text-align: center">
                            <div class="row">
                                <div class="col-5"><strong>Shopper Point</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5"><?php echo e($shopper->shopper_point); ?>*</div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-5"><strong>Total Sales</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5"><?php echo e($sts); ?>*</div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-5"><strong>Address</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5"><?php echo e($division->division_name); ?> , <?php echo e($country->country_name); ?></div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-5"><strong>Shipping</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5"><?php echo e($shopper->shipping_info); ?> <?php echo e($shopper->id); ?></div>
                            </div>
                            <br/>
                            <div class="row">
                                <a class="btn btn-info btn-block" href="<?php echo e(URL::to('/shopper-product/'.$shopper->id)); ?>">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div><br/>
                <div class="card">
                    <div class="card-header"><h4>Related Product</h4></div>
                    <div class="card-body">
                        <?php $__currentLoopData = $reletedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reletedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-2">
                                <div class="col-7">
                                    <a href="<?php echo e(URL::to('/product-view-by-id/'.$reletedProduct->id)); ?>"><h5><?php echo e(str_limit($reletedProduct->product_name_eng, 40)); ?></h5></a>
                                    <h4>৳ <?php echo e($reletedProduct->product_price_eng); ?></h4>
                                    <a href="<?php echo e(URL::to('/product-view-by-id/'.$reletedProduct->id)); ?>" class="btn btn-info">add to cart</a>
                                </div>
                                <?php $__currentLoopData = $rp_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($reletedProduct->id == $rpi->product_id): ?>
                                <div class="col-4"><img src="<?php echo e(asset($rpi->small_image)); ?>"/></div>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('/customTemplate')); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('/customTemplate')); ?>/js/product_custom.js"></script>
<script>
    var popupSize = {
        width: 780,
        height: 550
    };
    $(document).on('click', '.social-buttons > a', function(e){
        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>