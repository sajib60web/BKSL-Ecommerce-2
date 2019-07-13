<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bangla Kings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/style.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/respons.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/gallery.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/affiliate/css/lightbox.min.css">
    <script type="text/javascript" src="{!! asset('/customTemplate/') !!}/affiliate/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    {{--<script src="{!! asset('/customTemplate/') !!}/js/modernizr.custom.js"></script>--}}
    {{--product--}}



    {{--<script type="text/javascript">--}}
    {{--jQuery(document).ready(function($) {--}}
    {{--$(".scroll").click(function(event){--}}
    {{--event.preventDefault();--}}
    {{--$('html,body').animate({scrollTop:$(this.hash).offset().top},900);--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}


</head>

<body>
<div class="container">
    <br/>
    @include('customTemplate.affiliatePage.header')
    <div class="row">
        <div class="col-sm-12">
            @include('customTemplate.affiliatePage.navbar')
            @yield('content')
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
</body>

</html>

