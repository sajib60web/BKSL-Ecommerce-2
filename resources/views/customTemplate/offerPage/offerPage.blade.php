@extends('customTemplate.index')

@section('title', 'Offer Page')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/shop_responsive.css">

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset($dynamicpages->image)}}"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{$dynamicpages->page_name_eng}}</h2>
    </div>
</div>

<!-- Shop -->
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            @foreach($sub_categorys as $sub_category)
                            <li><a href="#">{{ $sub_category->sub_category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 58%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 58%;"></span>
                            </div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly="" style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>

                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            @foreach($brands as $brand)
                            <li class="brand"><a href="{{ url('/')}}">{{ $brand->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Shop Content -->
                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>Offer : </span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_grid" style="position: relative; height: 1012px;">
                        <div class="product_grid_border"></div>
                        <!-- Product Item -->
                        @foreach($products as $product)
                        <div class="product_item is_new" style="position: absolute; left: 0px; top: 0px;">
                            <div class="product_border"></div>
                            @foreach($images as $image)
                                @if($product->id == $image->product_id)
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($image->medium_image)}}" alt=""></div>
                                    @break
                                @endif
                            @endforeach
                            <div class="product_content">
                                <div class="product_price">৳ {{ $product->sale_Price }}</div>
                                <div class="product_name">
                                    <div>
                                        <a href="{{URL::to('/product-view-by-id/'.$product->id)}}" tabindex="0">{{str_limit($product->product_name_eng, 20)}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                @if(isset($user))
                                    <!-- <li class="product_mark product_new">new</li> -->
                                @else
                                    <li class="product_mark product_new" style="background-color: #df3b3b">-25%</li>
                                @endif
                            </ul>
                        </div>
                         @endforeach
                        <!-- End Product Item -->
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/customTemplate') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/customTemplate') }}/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('/customTemplate') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="{{ asset('/customTemplate') }}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{ asset('/customTemplate') }}/js/shop_custom.js"></script>
@endsection
