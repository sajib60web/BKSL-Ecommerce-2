@extends('customTemplate.affiliatePage.master')

@section('content')
    <div class="col-xl-6 col-lg-6 col-md-5 col-xs-5" style="border-right: 1px solid #a0a0a0; height: 410px;">
        <div class="gallery">
            @foreach($product_images as $product_image)
                <a href="{{asset($product_image->large_image)}}" data-lightbox="Banglaking"><img src="{{asset($product_image->medium_image)}}"/></a>
                {{--<a href="{{asset('/customTemplate/')}}/affiliate/images/8558295633_f34a55c1c6_b.jpg" data-lightbox="Banglaking"><img src="{{asset('/customTemplate/')}}/affiliate/images/8558295633_f34a55c1c6_b.jpg"/></a>--}}
                {{--<a href="{{asset('/customTemplate/')}}/affiliate/images/8563475581_df05e9906d_b.jpg" data-lightbox="Banglaking"><img src="{{asset('/customTemplate/')}}/affiliate/images/8563475581_df05e9906d_b.jpg"/></a>--}}
            @endforeach
        </div>
        <div class="middle-content">
            @foreach($product_images as $product_image)
                <a href="{{asset($product_image->large_image)}}" data-lightbox="Banglaking"><img src="{{asset($product_image->medium_image)}}"/></a>
                @break
            @endforeach
        </div>
        <div class="end-content" style="margin-left: 130px; margin-top: 10px;">
            @foreach($product_images as $product_image)
                <a href="{{asset($product_image->large_image)}}" data-lightbox="Banglaking"><img src="{{asset($product_image->medium_image)}}"/></a>
            @endforeach
        </div>
    </div>
    <strong style="float: right;">View : {!! $product->view_total !!}</strong>
    @foreach($products as $product)
        {{Form::open(['url'=> '/afflite-add-cart', 'method' => 'post', 'class' => 'form-horizontal' ])}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-xs-3" style="border: 0px solid #000000;">
            <h2>{!! $product->product_name_eng !!}</h2>
            <p>{!! $product->product_short_description_eng !!}</p>
            <b>Deal Code : {!! $product->id !!}</b><br/>
            <h1>Tk.{!! $product->product_price_eng !!}/-</h1>
            <div class="product_quantity">
                <strong style="color: #8c8c8c" >Quantity: </strong>
                <input id="quantity_input" class="form-control" name="product_qty" type="number" pattern="[0-9]*" value="1" min="1" >
                <input type="hidden" name="product_id" value="{!! $product->id !!}">
            </div>
            <script>
                function indsdald() {
                    var qt = $('#quantity_input').val();
                    if (qt >= {{$product->product_qty - 1}}){
                        // $('quantity_inc_button').removeClass('quantity_inc')
                        $('#quantity_input').val({{$product->product_qty - 1}});
                    }
                }
            </script>
            @if($size_arry != null)
                <select id="select_size" style="height: 48px; margin-top: 10px; display: block; color: black" name="product_size" class="form-control product_color">
                    <option >--Select Size--</option>
                    @foreach($sizes as $size)
                        <option value="">{!! $size->product_size_name !!}</option>
                    @endforeach
                </select>
            @endif
            <br/>
            <div class="button_container">
                <button type="submit" name="btn" value="addToCart" class="btn btn-primary " style="font-size: 12px">Add to Cart</button>
                <button type="submit" name="btn" value="orderNow" class="btn btn-danger " style="background-color: red; font-size: 12px">Order</button>
                <a href="{!! url('/afflite-cart-page') !!}"  class="btn btn-success" style="background-color: #0a8f08; font-size: 12px">Cart Page</a>
            </div>
            <br/>
            <nav class="navbar">
                <ul class="navbar-nav nav">
                    <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_1.png" alt=""></a></li>
                    <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_2.png" alt=""></a></li>
                    <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_3.png" alt=""></a></li>
                    <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_4.png" alt=""></a></li>
                </ul>
            </nav>
        </div>
        {{Form::close()}}
        <div class="row">
            <div class="col-sm-12" style="border: 0px solid #000000;">
                <div class="col-sm-8" style="border: 0px solid #CCCBC6;">
                    @foreach($products as $product)
                        <h2><i><u>Product Details : </u></i></h2>
                        <p>{!! $product->prodcut_long_description_eng !!}<br/></p>
                    @endforeach
                </div>
                <div class="col-sm-4" style="border-left: 1px solid #CCCBC6;">
                    <div class="card">
                        <div class="card-header"><h3 style="background-color: #a0a0a0; font-weight: bold; text-align: center;">Related Product</h3>
                            <div class="card-body">
                                @foreach($reletedProducts as $reletedProduct)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h4>{{$reletedProduct->product_name_eng}}</h4>
                                            <h4>৳ {{$reletedProduct->product_price_eng}}</h4>
                                            <br/>
                                            <a href="{{URL::to('/afflite-product-view/'.$reletedProduct->id)}}"><button class="btn btn-info">add to cart</button></a>
                                        </div>
                                        @foreach($rp_image as $rpi)
                                            @if($reletedProduct->id == $rpi->product_id)
                                                <div class="col-sm-4"><img src="{{asset($rpi->small_image)}}"/></div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endsection