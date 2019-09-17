<?php $__env->startSection('content'); ?>
    <div class="col-xl-6 col-lg-6 col-md-5 col-xs-5" style="border-right: 1px solid #a0a0a0; height: 410px;">
        <div class="gallery">
            <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset($product_image->large_image)); ?>" data-lightbox="Banglaking"><img src="<?php echo e(asset($product_image->medium_image)); ?>"/></a>
                
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="middle-content">
            <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset($product_image->large_image)); ?>" data-lightbox="Banglaking"><img src="<?php echo e(asset($product_image->medium_image)); ?>"/></a>
                <?php break; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="end-content" style="margin-left: 130px; margin-top: 10px;">
            <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset($product_image->large_image)); ?>" data-lightbox="Banglaking"><img src="<?php echo e(asset($product_image->medium_image)); ?>"/></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <strong style="float: right;">View : <?php echo $product->view_total; ?></strong>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(Form::open(['url'=> '/afflite-add-cart', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

        <div class="col-xl-3 col-lg-3 col-md-3 col-xs-3" style="border: 0px solid #000000;">
            <h2><?php echo $product->product_name_eng; ?></h2>
            <p><?php echo $product->product_short_description_eng; ?></p>
            <b>Deal Code : <?php echo $product->id; ?></b><br/>
            <h1>Tk.<?php echo $product->product_price_eng; ?>/-</h1>
            <div class="product_quantity">
                <strong style="color: #8c8c8c" >Quantity: </strong>
                <input id="quantity_input" class="form-control" name="product_qty" type="number" pattern="[0-9]*" value="1" min="1" >
                <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            </div>
            <script>
                function indsdald() {
                    var qt = $('#quantity_input').val();
                    if (qt >= <?php echo e($product->product_qty - 1); ?>){
                        // $('quantity_inc_button').removeClass('quantity_inc')
                        $('#quantity_input').val(<?php echo e($product->product_qty - 1); ?>);
                    }
                }
            </script>
            <?php if($size_arry != null): ?>
                <select id="select_size" style="height: 48px; margin-top: 10px; display: block; color: black" name="product_size" class="form-control product_color">
                    <option >--Select Size--</option>
                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value=""><?php echo $size->product_size_name; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php endif; ?>
            <br/>
            <div class="button_container">
                <button type="submit" name="btn" value="addToCart" class="btn btn-primary " style="font-size: 12px">Add to Cart</button>
                <button type="submit" name="btn" value="orderNow" class="btn btn-danger " style="background-color: red; font-size: 12px">Order</button>
                <a href="<?php echo url('/afflite-cart-page'); ?>"  class="btn btn-success" style="background-color: #0a8f08; font-size: 12px">Cart Page</a>
            </div>
            <br/>
            <nav class="navbar">
                <ul class="navbar-nav nav">
                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_1.png" alt=""></a></li>
                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_2.png" alt=""></a></li>
                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_3.png" alt=""></a></li>
                    <li><a href="#"><img src="<?php echo e(asset('customTemplate/images')); ?>/logos_4.png" alt=""></a></li>
                </ul>
            </nav>
        </div>
        <?php echo e(Form::close()); ?>

        <div class="row">
            <div class="col-sm-12" style="border: 0px solid #000000;">
                <div class="col-sm-8" style="border: 0px solid #CCCBC6;">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2><i><u>Product Details : </u></i></h2>
                        <p><?php echo $product->prodcut_long_description_eng; ?><br/></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-sm-4" style="border-left: 1px solid #CCCBC6;">
                    <div class="card">
                        <div class="card-header"><h3 style="background-color: #a0a0a0; font-weight: bold; text-align: center;">Related Product</h3>
                            <div class="card-body">
                                <?php $__currentLoopData = $reletedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reletedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h4><?php echo e($reletedProduct->product_name_eng); ?></h4>
                                            <h4>৳ <?php echo e($reletedProduct->product_price_eng); ?></h4>
                                            <br/>
                                            <a href="<?php echo e(URL::to('/afflite-product-view/'.$reletedProduct->id)); ?>"><button class="btn btn-info">add to cart</button></a>
                                        </div>
                                        <?php $__currentLoopData = $rp_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($reletedProduct->id == $rpi->product_id): ?>
                                                <div class="col-sm-4"><img src="<?php echo e(asset($rpi->small_image)); ?>"/></div>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('customTemplate.affiliatePage.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>