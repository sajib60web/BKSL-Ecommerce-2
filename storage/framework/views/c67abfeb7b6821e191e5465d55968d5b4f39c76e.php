<?php $__env->startSection('content'); ?>
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
        <div class="row">
            <h1 class="text-center text-info">== Enjoy Your Shopping ==</h1>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card" style="width:400px">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->id == $image->product_id): ?>
                                <img class="card-img-top" src="<?php echo asset($image->medium_image); ?>"
                                     alt="Card image" style="width:50%">
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-body" style="margin-left: 50px; margin-top: 10px;">
                            <h4 class="card-title"><?php echo $product->product_name_eng; ?></h4>
                            <p class="card-text" style="width: 230px; margin-top: 15px;">
                                TK.<?php echo $product->product_price_eng; ?></p>
                            <a href="<?php echo url('/afflite-product-view/'.$product->id); ?>" name="btn"
                               class="btn btn-success btn-block" style="margin-top: 15px; width: 130px;">Product
                                Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo e($products->links()); ?>

    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('customTemplate.affiliatePage.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>