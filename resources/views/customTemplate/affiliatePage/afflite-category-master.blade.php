<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/style.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/respons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/nivo-slider.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/owl.carousel.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/magnific-popup.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/style.css"/>

</head>
<br/>
<div class="container" style="border: 0px solid #000000;">
    <div class="row">
        <div class="col-sm-12">
                        @include('customTemplate.affiliatePage.header')
                        @include('customTemplate.affiliatePage.category-nav')
                        @yield('category')
        </div>
    </div>
</div>







<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/wow.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/slick.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.countdown.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.elevateZoom-3.0.8.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/custom.js" type="text/javascript"></script>



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