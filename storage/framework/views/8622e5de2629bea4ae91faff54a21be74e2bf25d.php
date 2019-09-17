<?php $__env->startSection('title', 'Shipping Address'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/contact_responsive.css">
<style type="text/css" media="screen">
 .form-control {
    display: block;
    width: 100% !important;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #000;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}   
</style>
<div class="contact_form">
    <div class="container">
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Shipping Information</div>
                        <p>Hi, <strong><?php echo e(Session::get('customer_name')); ?></strong> Fill Up Your Shipping Information. If your Billing & Shipping Information are Same Just Click The <strong>Confirm & Next</strong>The Button</p>
                        <?php echo e(Form::open(['url'=> '/save-shipping', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="ship_customer_name"  value="<?php echo e($customer->customer_name); ?>" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="ship_customer_phone_number" value="<?php echo e($customer->customer_phone_number); ?>"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="email" name="ship_customer_email"  value="<?php echo e($customer->customer_email); ?>" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <select required id="country" name="ship_country" class="form-control">
                                <option >--Select Country--</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>" ><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <select id="division" name="ship_division" class="form-control">
                                <option >--Select Division--</option>
                            </select>
                        </div>
                        <div id="shipp_id" style="display:none!important;" class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input  readonly type="hidden" id="shippingChargeInput" name="ship_charge"  class="form-control" placeholder="" required="required" data-error="Name is required.">
                            <h6>Your Shipping Charge Will Be <strong id="shippingCharge">0.00</strong> Taka</h6>
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <textarea name="ship_customer_address" placeholder="Enter your Full Address" class="form-control" ><?php echo e($customer->customer_address); ?></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" name="btn" class="btn-block button contact_submit_button">Confirm & Next</button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

<script src="<?php echo e(asset('/customTemplate')); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('/customTemplate')); ?>/js/product_custom.js"></script>
<script>
    $(document).on('change','#country', function () {
        var country_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '<?php echo route("/manage-division"); ?>',
            data:{'id':country_id},
            success:function (data) {
                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                }
                $('#division').html(op);
            }
        });
    });
</script>

<script>
    $(document).on('change','#country', function () {
        var country_id = $(this).val();
        // alert(country_id)
        $.ajax({
            type:'get',
            url: '<?php echo route("/manage-charge-country"); ?>',
            data:{'id':country_id},
            success:function (data) {
                $('#shipp_id').show()
                $('#shippingCharge').html(data)
                $('#shippingChargeInput').val(data)
            }
        });
    });
</script>
<script>
    $(document).on('change','#division', function () {
        var country_id = $(this).val();
        // alert(country_id)
        $.ajax({
            type:'get',
            url: '<?php echo route("/manage-charge-division"); ?>',
            data:{'id':country_id},
            success:function (data) {
                // alert(data)
                $('#shipp_id').show()
                $('#shippingCharge').html(data)
                $('#shippingChargeInput').val(data)
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>