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
                <br/>
                <h2><b>Billing Information</b></h2>
                <hr/>
                <div class="alert alert-success text-center">
                    <p>Dear <strong>{{Session::get('customer_name')}},</strong> Please Fill Your Billing Information</p>
                </div>
                <br/>
                {{Form::open(['url'=> '/customer-bill-save', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                @csrf
                    <div class="form-group">
                        <input type="text" style="height: 45px;" name="customer_name"  value="{{$customer->customer_name}}"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                        <input type="hidden" name="customer_id"  value="{{Session::get('customer_id')}}" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <input type="number" style="height: 45px;" name="customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <input type="email" style="height: 45px;" name="customer_email" value="{{$customer->customer_email}}"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="customer_address"  required="required" placeholder="Enter your Full Address"  data-error="Address is required." ></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" style="height: 45px;" name="btn" class="btn btn-primary btn-block">Confirm & Next</button>
                    </div>
                {{Form::close()}}
            </div>
            <div class="top_bar_user" style="border: 0px solid #000000; float: right; width: 200px; margin-top: 10px;">
                @if(Session::get('customer_id'))
                    <div class="text-center text-capitalize text-info"><span class="glyphicon glyphicon-user"> {{Session::get('customer_name')}}</span>&nbsp; &nbsp; &nbsp;||<a href="{{URL::to('/index')}}" style="margin: 20px;">&nbsp;Logout</a></div>
                    {{--<div><a href="{{URL::to('/customer-logout')}}">Logout</a></div>--}}
                @else
                    <div class="text-center text-justify">
                        <span class="glyphicon glyphicon-user"><a href="{{URL::to('/register-affiliate-customer')}}" style="font-size: 18px;"> Register</a></span>
                        <a href="{{URL::to('/register-affiliate-customer')}}" style="margin: 20px;">Login</a>
                    </div>
                    {{--<div><a href="{{URL::to('/register-customer')}}">Sign in</a></div>--}}
                @endif
            </div>
            <div class="col-sm-3 alert alert-heading">
                <br/>
                <div class="cart_count" style="float: right; font-size: 20px;"><i style="color: deepskyblue;" class="glyphicon glyphicon-shopping-cart"> <b>Cart :</b> <span style="color: #0a7e07; font-weight: bold;">{{Cart::getTotalQuantity()}}</span></i><br/>
                    <strong style="font-size: 20px; float: right;">৳ {{Cart::getSubTotal()}}</strong>
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