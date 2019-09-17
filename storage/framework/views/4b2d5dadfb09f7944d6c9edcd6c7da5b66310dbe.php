<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset('/customTemplate/'); ?>/styles/style.css">
    <link rel="stylesheet" href="<?php echo asset('/customTemplate/'); ?>/styles/respons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/nivo-slider.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/owl.carousel.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/magnific-popup.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('/customTemplate/'); ?>/affiliate/css/style.css"/>





</head>
<body>
<br/>
<div class="container" style="border: 0px solid #000000;">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4" style="border: 0px solid #000000;"></div>
            <div class="col-sm-4" style="border: 0px solid #000000;">
                <form class="form-inline" action="<?php echo url('/category-search'); ?>" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" required name="category_search" id="search"  value="<?php echo e(request()->input('category_search')); ?>" class="form-control"  placeholder="Searching..">
                        </div>
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="col-sm-4" style="border: 0px solid #000000;">
                <div class="cart_count" style="float: right; font-size: 20px;"><a href="<?php echo url('/afflite-cart-page'); ?>"> <i style="color: #0d82d3;" class="glyphicon glyphicon-shopping-cart"> <b>Cart :</b> <span style="color: #0a7e07; font-weight: bold; margin-right: 20px;"><?php echo e(Cart::getTotalQuantity()); ?></span></i></a>
                    <strong style="font-size: 20px; float:right;">৳ <?php echo e(Cart::getSubTotal()); ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
                <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse" style="margin-left: 20px;">
                    <span>Category Menu</span>
                </button>
                <div class="collapse navbar-collapse" id="hideMenu">
                    <br/>
                    <div class="well" style="height: 300px;">

                        <ul class="nav">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo url('/afflite-category-product', $category->id); ?>"><?php echo $category->category_name; ?></a> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>
                </div>

                <div class="navbar-nav" id="hideMenu">
                    <h3 style="font-weight: bold">Sub_Category</h3>
                    <hr/>
                    <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="nav">
                        <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;"><?php echo $sub_category->sub_category_name; ?></a> </li>
                    </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="navbar-nav" id="hideMenu">
                    <h3 style="font-weight: bold">Brand</h3>
                    <hr/>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="nav">
                            <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;"><?php echo $brand->brand_name; ?></a> </li>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <br/>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-xs-8" style="margin-top: 0px;">
                <div class="row">
                    <div class="top_bar_user" style="margin-top: 25px; float: right; width: 200px;">
                        <?php if(Session::get('customer_id')): ?>
                            <div class="text-center text-capitalize text-info"><span class="glyphicon glyphicon-user"> <?php echo e(Session::get('customer_name')); ?></span>&nbsp; &nbsp; &nbsp;||<a href="<?php echo e(URL::to('/logout')); ?>" style="margin: 20px; text-decoration: none;">&nbsp;Logout</a></div>
                            
                        <?php else: ?>
                            <div class="text-center text-justify">
                                <span class="glyphicon glyphicon-user"><a href="<?php echo e(URL::to('/register-affiliate-customer')); ?>" style="font-size: 18px; text-decoration: none;"> Register</a></span>
                                <a href="<?php echo e(URL::to('/register-affiliate-customer')); ?>" style="margin: 20px; text-decoration: none;">Sign in</a>
                            </div>
                            
                        <?php endif; ?>
                    </div>
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
                                    <div class="card-body" style="margin-left: 50px; margin-top: 10px;">
                                        <h4 class="card-title text-left"><?php echo $product->product_name_eng; ?></h4>
                                        <p class="card-text" style="width: 230px; margin-top: 15px;">TK.<?php echo $product->product_price_eng; ?></p>
                                        
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>







<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/wow.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/slick.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery.countdown.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/jquery.elevateZoom-3.0.8.min.js" type="text/javascript"></script>
<script src="<?php echo asset('/customTemplate/'); ?>/affiliate/js/custom.js" type="text/javascript"></script>



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

</body>
</html>