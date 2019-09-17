<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bangla Kings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset('/customTemplate/'); ?>/styles/style.css">
    <link rel="stylesheet" href="<?php echo asset('/customTemplate/'); ?>/styles/respons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
<br/>
<br/>
<div class="container" style="border: 2px solid rgba(0,1,1,0.34);">

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" style="height: 500px;">
            <div class="top_bar_user" style="margin-top: 25px; float: right; width: 200px;">
                <?php if(Session::get('customer_id')): ?>
                    <div class="text-center text-capitalize text-info"><span class="glyphicon glyphicon-user"> <?php echo e(Session::get('customer_name')); ?></span>&nbsp; &nbsp; &nbsp;<a href="<?php echo e(URL::to('/logout')); ?>" style="margin: 20px; text-decoration: none;">&nbsp;Logout</a></div>
                    
                <?php else: ?>
                    <div class="text-center text-justify">
                        <span class="glyphicon glyphicon-user"><a href="<?php echo e(URL::to('/register-affiliate-customer')); ?>" style="font-size: 18px; text-decoration: none;"> Register</a></span>
                        <a href="<?php echo e(URL::to('/register-affiliate-customer')); ?>" style="margin: 20px; text-decoration: none;">Sign in</a>
                    </div>
                    
                <?php endif; ?>
            </div>
            <br/>
            <h2 style="margin-left: 40px;"><b>Payment</b></h2>
            <hr/>
            <br/>
            <?php echo e(Form::open(['url'=> '/success-order', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

            <?php echo csrf_field(); ?>
            <div class="form-group" style="margin-left: 40px;">

                    <?php if(Session::get('discount')): ?>
                        <p>Your Total Charge Will Be <strong><?php echo e((Session::get('pubSubTotal')-(((Session::get('pubSubTotal'))*(Session::get('discount')))/100))+Session::get('shipCharge')); ?></strong>  Taka.... (Include Shipping Charge) with <strong><?php echo e(Session::get('discount').'%'); ?></strong> discount</p>
                    <?php else: ?>
                        <p>Your Total Charge Will Be <strong><?php echo e(Session::get('pubSubTotal')+Session::get('shipCharge')); ?></strong>  Taka.... (Include Shipping Charge)</p>
                    <?php endif; ?>

            </div>
            <br>
            <br>
            <div class="form-group" style="margin-left: 20px;">
                <div class="col-sm-2">
                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="card"  placeholder="Enter your name" required="required" data-error="Name is required."></label>
                    <label>Card</label>
                </div>
                <div class="col-sm-2" style="margin-left: 110px;">
                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="cash"  placeholder="Enter your name" required="required" data-error="Name is required."></label>
                    <label>Card</label>
                </div>
                <div class="col-sm-3" style="margin-left: 110px;">
                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="paypal"  placeholder="Enter your name" required="required" data-error="Name is required."></label>
                    <label>Paypal</label>
                </div>
            </div>
            <div class="form-group" style="margin-top: 60px;">
                <button type="submit" name="btn" style="background-color: #0d82d3; height: 45px; font-size: 24px; color: white;" class=" btn btn-block">Confirm</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
        <div class="col-sm-3 alert alert-heading">
            <br/>
            <div class="cart_count" style="float: right; font-size: 20px;"><a href="<?php echo url('/afflite-cart-page'); ?>"> <i style="color: #0d82d3;" class="glyphicon glyphicon-shopping-cart"> <b>Cart :</b> <span style="color: #0a7e07; font-weight: bold;"><?php echo e(Cart::getTotalQuantity()); ?></span></i></a><br/>
                <strong style="font-size: 20px; float:right;">৳ <?php echo e(Cart::getSubTotal()); ?></strong>
            </div>
        </div>
    </div>
</div>


<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{your-app-id}',
            cookie     : true,
            xfbml      : true,
            version    : '{api-version}'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>


<script>
    $(document).on('change','#country', function () {
        var country_id = $(this).val();

        var op= " ";

        $.ajax({
            type:'get',
            url: '<?php echo route('/manage-division'); ?>',
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
            url: '<?php echo route('/manage-charge-country'); ?>',
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
            url: '<?php echo route('/manage-charge-division'); ?>',
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





</body>

</html>