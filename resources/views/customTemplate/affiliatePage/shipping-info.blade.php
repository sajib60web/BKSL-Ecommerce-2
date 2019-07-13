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
        <div class="col-sm-6">
            <br/>
            <h2><b>Shipping Information</b></h2>
            <hr/>
            <p>Hi Dear <strong>{{Session::get('customer_name')}} Sir </strong>  Fill Up Your Shipping Information. If your Billing & Shipping Information are Same Just Click The  <strong>  Confirm & Next</strong></p>
            <br/>
            {{Form::open(['url'=> '/customer-shipping-save', 'method' => 'post', 'class' => 'form-horizontal' ])}}
            @csrf
            <div class="form-group">
                <input type="text" style="height: 45px;" name="ship_customer_name"  value="{{$customer->customer_name}}"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">

            </div>
            <div class="form-group">
                <input type="number" style="height: 45px;" name="ship_customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">
            </div>
            <div class="form-group">
                <input type="email" style="height: 45px;" name="ship_customer_email" value="{{$customer->customer_email}}"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
            </div>
            <div class="form-group">
                <select required id="country" style="height: 45px;" name="ship_country" class="form-control product_color">
                    <option >--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}" >{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select id="division" name="ship_division" style="height: 45px;" class="form-control product_color">
                    <option >--Select Division--</option>
                </select>
            </div>
            <div id="shipp_id" style="display:none!important;" class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                <input  readonly type="hidden" id="shippingChargeInput" name="ship_charge"  class="form-control" placeholder="" required="required" data-error="Name is required.">
                <h4>Your Shipping Charge Will Be <strong id="shippingCharge" style="color: red;">0.00</strong> Taka</h4>

            </div>
            <br/>
            <div class="form-group">
                <textarea class="form-control" name="ship_customer_address"  required="required" placeholder="Enter your Full Address"  data-error="Address is required." >{{$customer->customer_address}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" style="height: 45px;" name="btn" class="btn btn-primary btn-block">Confirm & Next</button>
            </div>
            {{Form::close()}}
        </div>
        <div class="col-sm-3 alert alert-heading">
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
            <br/>
            <br/>
            <div class="cart_count" style="float: right; font-size: 20px;"><i style="color: deepskyblue;" class="glyphicon glyphicon-shopping-cart"> <b>Cart :</b> <span style="color: #0a7e07; font-weight: bold;">{{Cart::getTotalQuantity()}}</span></i><br/>
                <strong style="font-size: 20px;">৳ {{Cart::getSubTotal()}}</strong>
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
            url: '{!! route('/manage-division') !!}',
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
            url: '{!! route('/manage-charge-country') !!}',
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
            url: '{!! route('/manage-charge-division') !!}',
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