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
<div class="container" style="border: 1px solid rgba(0,1,1,0.34);">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="border: 0px solid #000000;">
                <br/>
                <strong>Thank You For Your Shopping....</strong>
                <p>You are successfully complete shopping.. we will contact you soon..</p>
                <table class="table table-bordered">
                    <tr>
                        <td style="text-align: center" colspan="2";><b>Invoice Number : {{$order->id}}</b></td>
                    </tr>
                    <br/>
                    <tr>
                        <th style="text-align: center" colspan="2">Billing Information</th>
                    </tr><tr>
                        <td style="text-align: center">Name </td>
                        <td style="text-align: center">{{$billing_info->customer_name}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Phone Number </td>
                        <td style="text-align: center">{{$billing_info->customer_phone_number}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Email</td>
                        <td style="text-align: center">{{$billing_info->customer_email}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Address</td>
                        <td style="text-align: center">{{$billing_info->customer_address}}</td>

                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center" colspan="2">Shipping Information</th>
                    </tr><tr>
                        <td style="text-align: center">Name </td>
                        <td style="text-align: center">{{$shipping_info->ship_customer_name}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Phone Number </td>
                        <td style="text-align: center">{{$shipping_info->ship_customer_phone_number}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Email</td>
                        <td style="text-align: center">{{$shipping_info->ship_customer_email}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Country</td>
                        <td style="text-align: center">{{$country->country_name}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Division</td>
                        <td style="text-align: center">{{$division->division_name}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Address</td>
                        <td style="text-align: center">{{$shipping_info->ship_customer_address}}</td>

                    </tr>

                </table>
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center" colspan="2">Payment Information</th>
                    </tr>
                    <tr>
                        <td style="text-align: center">Payment Type </td>
                        <td style="text-align: center">{{$payment->payment_type}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: center">Payment Status </td>
                        <td style="text-align: center">{{$payment->payment_status}}</td>

                    </tr>

                </table>
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center" colspan="2">Product Information</th>
                    </tr>
                    @php($sum=0)
                    @foreach($order_details as $order_detail)
                        <tr>
                            <td style="text-align: center">Name </td>
                            <td style="text-align: center">{!! $order_detail->product_name !!}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Quantity </td>
                            <td style="text-align: center">{!! $order_detail->product_qty !!}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Price </td>
                            <td style="text-align: center">{!! $order_detail->product_price !!}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Total </td>
                            <td style="text-align: center">TK. {!! $total = $order_detail->product_qty*$order_detail->product_price !!}</td>
                        </tr>
                        @php($sum = $sum + $total)
                    @endforeach
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center">Total Amount : </th>
                        <th style="text-align: center">{!! $sum !!}</th>
                    </tr>
                    <tr>
                        <th style="text-align: center"> <strong>Grand Total :</strong> (Include shipping charge) </th>
                        <th style="text-align: center">{{$order->order_total}}</th>

                    </tr>

                </table>
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center"><a style="text-decoration: none; color: white" href="{{URL::to('/download-invoice/'.$order->id)}}" class="btn btn-success btn-block">Download Invoice</a></th>
                    </tr>

                </table>
            </div>
            <div class="col-sm-3">
                <div class="top_bar_user" style="border: 0px solid #000000; float: right; width: 200px; margin-top: 10px;">
                    @if(Session::get('customer_id'))
                        <div class="text-center text-capitalize text-info"><span class="glyphicon glyphicon-user"> {{Session::get('customer_name')}}</span>&nbsp; &nbsp; &nbsp;<a href="{{URL::to('/index')}}" style="margin: 20px;">&nbsp;Logout</a></div>
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
                <div class="cart_count" style="float: right; font-size: 20px;"><i style="color: #0d82d3;" class="glyphicon glyphicon-shopping-cart"> <b>Cart :</b> <span style="color: #0a7e07; font-weight: bold;">{{Cart::getTotalQuantity()}}</span></i><br/>
                    <strong style="font-size: 20px;">৳ {{Cart::getSubTotal()}}</strong>
                </div>
            </div>
        </div>

    </div>
</div>





</body>

</html>