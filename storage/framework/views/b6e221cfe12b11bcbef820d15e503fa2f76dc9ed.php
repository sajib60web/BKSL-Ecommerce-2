<?php $__env->startSection('title', 'Payment'); ?>
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/contact_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Payment</div>
                        <?php echo e(Form::open(['url'=> '/save-payment', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <?php if(Session::get('discount')): ?>
                                <p>Your Total Charge Will Be <strong><?php echo e((Session::get('pubSubTotal')-(((Session::get('pubSubTotal'))*(Session::get('discount')))/100))+Session::get('shipCharge')); ?></strong>  Taka.... (Include Shipping Charge) with <strong><?php echo e(Session::get('discount').'%'); ?></strong> discount</p>
                            <?php else: ?>
                                <p>Your Total Charge Will Be <strong><?php echo e(Session::get('pubSubTotal')+Session::get('shipCharge')); ?></strong>  Taka.... (Include Shipping Charge)</p>
                            <?php endif; ?>
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <label ><input type="radio" name="payment_type" id="contact_form_name" value="cash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">Cash</label>
                            <label ><input type="radio" name="payment_type" id="contact_form_name" value="card" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">Card</label>
                            <label ><input type="radio" name="payment_type" id="contact_form_name" value="paypal" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">Paypal</label>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" name="btn" class="btn-block button contact_submit_button">Confirm</button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>