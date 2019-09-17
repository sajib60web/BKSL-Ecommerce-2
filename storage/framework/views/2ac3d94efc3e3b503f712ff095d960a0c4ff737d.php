<?php $__env->startSection('title', 'Shopper Dashboard'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row mt-5">
            <?php if(Session::get('message')): ?>
            <h4 style="margin: 0 auto; margin-bottom: 20px; color: green;"><?php echo e(Session::get('message')); ?></h4>
            <?php endif; ?>
        </div>
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <a href="<?php echo e(route('/shopper-create-product')); ?>" class="btn btn-success" style="float: right; margin-bottom: 20px;">Add Product</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">
                                Product.Name : <br>
                                Product.Price : <br>
                            </th>
                            <th scope="col">Product.Code</th>
                            <th scope="col">Action</th>
                            <th scope="col">Admin Status</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->id == $image->product_id): ?>
                                <img src="<?php echo e(asset($image->large_image)); ?>" alt="Image" width="50" height="50">
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                Product.Name : <?php echo e(str_limit($product->product_name_eng, 60)); ?><br>
                                Product.Price : <?php echo e($product->sale_Price); ?> .Tk<br>
                            </td>
                            <td># <?php echo e($product->id); ?><br>
                            </td>
                            <td>
                                <?php if($product->status == 0): ?>
                                <a class="btn btn-danger" href="#" title="Place admin review">
                                    <i class="far fa-thumbs-down"></i>
                                </a>
                                <?php else: ?>
                                <a class="btn btn-success" title="Place Unpublished Youer Product" href="<?php echo e(URL::to('unpublished_product/'.$product->id)); ?>">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                                <?php endif; ?>
                                <a class="btn btn-info" href="<?php echo e(URL::to('shopper-image-update-product/'.$product->id)); ?>">
                                    <i class="fas fa-images"></i>
                                </a>
                                <a class="btn btn-info" href="<?php echo e(URL::to('shopper-edit-product/'.$product->id)); ?>">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <a class="btn btn-danger" href="<?php echo e(URL::to('/shoppe-delete-product/'.$product->id)); ?>" onclick="return confirm('Are You Sure to Delete');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>
                                <?php if($product->status == 1): ?>
                                <a class="btn btn-success">Published</a>
                                <?php else: ?>
                                <a class="btn btn-danger">Unpublished</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('/customTemplate/js/')); ?>/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/styles/')); ?>/bootstrap4/popper.js"></script>
<script src="<?php echo e(asset('/customTemplate/styles/')); ?>/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/plugins/')); ?>/greensock/TweenMax.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/plugins/')); ?>/greensock/TimelineMax.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/plugins/')); ?>/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/plugins/')); ?>/greensock/animation.gsap.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/plugins/')); ?>/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo e(asset('/customTemplate/plugins/')); ?>/easing/easing.js"></script>



<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>