@extends('customTemplate.index')

@section('title', 'Category')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/shop_responsive.css">

<div class="home">
    @if(isset($category_name->category_name))
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset($category_name->image)}}"></div>
    @endif
    @if(isset($category_name->image))
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset($category_name->image)}}"></div>
    @endif
    
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        @if(isset($category_name->category_name))
            <h2 class="home_title">{{$category_name->category_name}}</h2>
        @endif
        @if(isset($category_name->sub_category_name))
            <h2 class="home_title">{{$category_name->sub_category_name}}</h2>
        @endif
        @if(isset($brand_name->brand_name))
            <h2 class="home_title">{{$brand_name->brand_name}}</h2>
        @endif
    </div>
</div>

<!-- Shop -->
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <!-- @if(isset($sub_categories)) -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">Sub Categories</div>
                        <ul class="sidebar_categories">
                            @foreach($sub_categories as $subCategory)
                                    <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}</a></li>
                                
                            @endforeach
                        </ul>
                    </div>
                    <!-- @endif -->
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
                            <li class="brand"><a href="{{URL::to('/view-product-by-brand/'.$brand->id)}}">{{ $brand->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Shop Content -->
                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>Product : </span> products found</div>
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
                    <div class="product_grid">
                        <div class="product_grid_border"></div>
                        <!-- Product Item -->
                        @foreach($products as $product)
                        <a href="{{URL::to('/product-view-by-id/'.$product->id)}}">
                            <div class="product_item is_new" style="float: left;">
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
                                <div class="product_fav">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </a>
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
