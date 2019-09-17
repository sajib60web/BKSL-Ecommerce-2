<?php $__env->startSection('title','Cart'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row">
            <?php if(Session::get('message')): ?>
                <h4 style="margin: 0 auto; margin-bottom: 20px; color: red"><?php echo e(Session::get('message')); ?></h4>
            <?php endif; ?>
        </div>
        <div class="row mt-5" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-12">
                <div class="col-12 offset-1" style="margin: 0 auto; ">
                    <div class="cart_title">Shopping Cart</div>
                    <div class="component-box">
                        <!-- Text fields example -->
                        <?php $__currentLoopData = $cartContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <hr/>
                        <div class="row">
                            <div class="col-4">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <div class="form-group">
                                            <img  src="<?php echo e(asset($cartContent->attributes->image)); ?>">
                                        </div>
                                    <!-- Textarea -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" >
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <div class="form-group">
                                            <h6 style="text-align: left"><?php echo e(str_limit($cartContent->name)); ?></h6>
                                            <label>Quantity</label>
                                            <input onblur="updateCart(<?php echo e($cartContent->id); ?>,this.value)" id="product_qty"    style="height: 30px; margin-bottom: 10px; max-width: 100px; text-align: center" type="number" value="<?php echo e($cartContent->quantity); ?>"  class="form-control">
                                            <h6 class="" style="text-align: left; color: #0d82d3">Price : ৳ <?php echo e($cartContent->price); ?></h6>
                                            <h6 class="" style="text-align: left">Total : ৳ <?php echo e($cartContent->quantity*$cartContent->price); ?></h6>
                                        </div>
                                        <!-- Textarea -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 " style="margin: auto;">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                            <button  onclick="removeCart(<?php echo e($cartContent->id); ?>)" id="btn" class="btn pmd-ripple-effect btn-danger btn-block" type="submit">Remove</button>
                                        <!-- Textarea -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end Text fields example -->
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr/>
                    <div class="row" style="text-align: center; margin: auto">
                        <div class="col-5"><h4>Member Card</h4></div>
                        <div class="col-2"><h4>:</h4></div>
                        <div class="col-5"><h4><input type="number" id="membership_id" class="form-control"></h4></div>
                    </div>
                    <hr/>
                    <div class="row" style="text-align: center; margin: auto">
                        <div class="col-5"><h4>Sub-Total</h4></div>
                        <div class="col-2"><h4>:</h4></div>
                        <div class="col-5" id="subTotal"><h4>৳ <?php echo e($subTotal); ?></h4></div>
                    </div>
                    <hr/>
                    <div class="row" style="text-align: center; margin: auto">
                        <div class="col-5"><h4>Total</h4></div>
                        <div class="col-2"><h4>:</h4></div>
                        <div class="col-5" ><h4>৳ <span id="subTotalwithDis"><?php echo e($subTotal); ?></span></h4></div>
                    </div>
                    <hr/>
                    <div class="row" style="text-align: center; margin: auto">
                        <div class="col-5"><a href="<?php echo e(URL::to('/')); ?>" class="btn btn-primary btn-block">More.. Shopping</a></div>
                        <div class="col-2"><h4></h4></div>
                        <?php if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id')): ?>
                            <div class="col-5"><a href="<?php echo e(URL::to('/payment')); ?>" class="btn btn-success btn-block">Check Out</a></div>
                        <?php elseif(Session::get('customer_id') && Session('billing_id')): ?>
                            <div class="col-5"><a href="<?php echo e(URL::to('/shipping')); ?>" class="btn btn-success btn-block">Check Out</a></div>
                        <?php elseif(Session::get('customer_id')): ?>
                            <div class="col-5"><a href="<?php echo e(URL::to('/billing')); ?>" class="btn btn-success btn-block">Check Out</a></div>
                        <?php else: ?>
                            <div class="col-5"><a href="<?php echo e(URL::to('/register-customer')); ?>" class="btn btn-success btn-block">Check Out</a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

<script src="<?php echo e(asset('/customTemplate/js/')); ?>/jquery-3.3.1.min.js"></script>

<script>
    $('#membership_id').blur(function () {
        var id= ($(this).val())
        var disPrice = $('#subTotalwithDis').val()
        $.ajax({
            type:'get',
            url: '<?php echo route('/memberCart-discount'); ?>',
            datatype: 'html',
            data:{'id':id},
            success:function (data) {
                $('#subTotalwithDis').html(data);
            }
        });
    });
</script>
<script>
    function updateCart(id,qty) {
        $.ajax({
            type:'get',
            url: '<?php echo route('/update-cart-blur'); ?>',
            datatype: 'html',
            data:{
                'id':id,
                'qty':qty
            },
            success:function (data) {
                window.location.reload();
            }
        });
    }
</script>
<script>
    function removeCart(id) {
        $.ajax({
            type:'get',
            url: '<?php echo route('/remove-cart'); ?>',
            datatype: 'html',
            data:{'id':id},

            success:function (data) {
                window.location.reload();
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>