<?php $__env->startSection('title', 'Shopper Login'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_responsive.css">

<style type="text/css" media="screen">
.contact_form_title {
    font-size: 30px;
    font-weight: 500;
    margin-bottom: 37px;
}
</style>
<div class="contact_form">
    <div class="container">
        <div class="row mt-5">
            <?php if(Session::get('message')): ?>
            <h4 style="margin: 0 auto; margin-bottom: 20px; color: red"><?php echo e(Session::get('message')); ?></h4>
            <?php endif; ?>
        </div>
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_title">Shopper Login</div>
                    <?php echo e(Form::open(['url'=> '/shopper-login-dashboard', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

                    <div class="component-box">
                        <!-- Text fields example -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Email</label>
                                            <input required type="email" class="form-control" name="email" placeholder="Please enter your email address">
                                        </div>
                                        <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red"><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Password</label>
                                            <input required type="password" id="password" class="form-control" name="password" placeholder="Please enter your password">
                                        </div>
                                        <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red"><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        <!-- Textarea -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end Text fields example -->
                    </div>
                    <div class="pmd-modal-action">
                        <button id="btn" class="btn pmd-ripple-effect btn-primary btn-block" type="submit">Login</button>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>