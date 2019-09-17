<?php $__env->startSection('category'); ?>
    <div class="col-sm-9" style="margin-top: 0px;">
        <div class="row">
            <h2 class="text-left"><em>Category Product</em></h2>
            <hr/>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card" style="width:400px">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->id == $image->product_id): ?>
                                <a href="<?php echo url('/afflite-product-view/'.$product->id); ?>"><img class="card-img-top" src="<?php echo asset($image->medium_image); ?>" alt="Card image" style="width:40%; border-right: 2px solid red;"></a>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-body" style="margin-left: 20px; margin-top: 10px;">
                            <h4 class="card-title text-left"><?php echo $product->product_name_eng; ?></h4>
                            <p class="card-text" style="width: 230px; margin-top: 15px;">TK.<?php echo $product->product_price_eng; ?></p>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <center><?php echo e($products->links()); ?></center>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('customTemplate.affiliatePage.afflite-category-master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>