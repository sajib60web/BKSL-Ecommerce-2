@extends('customTemplate.index')

@section('title', 'Home')

@section('mainContent')
<!-- Banner -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($slider_image as $key =>$s_image)
        @if($key == 0)
        <div class="carousel-item active">
            @else
            <div class="carousel-item">
                @endif
                <img class="d-block w-100" src="{{asset($s_image->slider_image)}}" alt="Second slide">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- Characteristics -->

<div class="characteristics" style="">
    <div class="container">
        <div class="row">
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('/customTemplate') }}/images/char_1.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('/customTemplate') }}/images/char_2.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('/customTemplate') }}/images/char_3.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('/customTemplate') }}/images/char_4.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hot New Arrivals -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot New Arrivals</div>
                        <ul class="clearfix">
                            <li class="active">Featured</li>
                            <li>On Sale</li>
                            <li>Top Rated</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3" style="overflow: hidden;">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="arrivals_single_image"><img src="{{ asset('/customTemplate') }}/images/banner1.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9" style="z-index:1;">
                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">
                                    @foreach($fProducts as $fProduct)
                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($fProduct->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$fProduct->id)}}">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset($image->medium_image)}}" alt="">
                                                    </div>
                                                </a>
                                                @break
                                                @endif
                                            @endforeach
                                            <div class="product_content">
                                                <div class="product_price">৳ {{$fProduct->sale_Price}}</div>
                                                <div class="product_name">
                                                    <div><a href="{{URL::to('/product-view-by-id/'.$fProduct->id)}}">{{str_limit($fProduct->product_name_eng, 20)}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{URL::to('/product-view-by-id/'.$fProduct->id)}}">
                                                        <button class="product_cart_button">View Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel">
                                <div class="arrivals_slider slider">
                                    @foreach($tsProducts as $tsProduct)
                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($tsProduct->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$tsProduct->id)}}">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset($image->medium_image)}}" alt="">
                                                    </div>
                                                </a>
                                                @break
                                                @endif
                                            @endforeach
                                            <div class="product_content">
                                                <div class="product_price">৳ {{$tsProduct->sale_Price}}</div>
                                                <div class="product_name">
                                                    <div><a href="{{URL::to('/product-view-by-id/'.$tsProduct->id)}}">{{str_limit($tsProduct->product_name_eng, 20)}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{URL::to('/product-view-by-id/'.$tsProduct->id)}}">
                                                        <button class="product_cart_button">View Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel">
                                <div class="arrivals_slider slider">
                                    @foreach($trProducts as $trProduct)
                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($trProduct->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$trProduct->id)}}">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset($image->medium_image)}}" alt="">
                                                    </div>
                                                </a>
                                                @break
                                                @endif
                                            @endforeach
                                            <div class="product_content">
                                                <div class="product_price">৳ {{$trProduct->sale_Price}}</div>
                                                <div class="product_name">
                                                    <div><a href="{{URL::to('/product-view-by-id/'.$trProduct->id)}}">{{str_limit($trProduct->product_name_eng, 20)}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{URL::to('/product-view-by-id/'.$trProduct->id)}}">
                                                        <button class="product_cart_button">View Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($mainCategories as $key => $mainCategory)
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{$mainCategory->category_name}}</div>
                        <ul class="clearfix">
                            <li class="active">Featured</li>
                            <li>On Sale</li>
                            <li>Top Rated</li>
                            <a href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}">
                                <li>See More..</li>
                            </a>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3" style="overflow: hidden;">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="arrivals_single_image"><img src="{{ asset('/customTemplate') }}/images/banner1.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">
                                    <!-- Slider Item -->
                                    @foreach($fProducts as $fProduct)
                                    @if($fProduct->main_category_id == $mainCategory->id)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($fProduct->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$fProduct->id)}}">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset($image->medium_image)}}" alt="Product Image">
                                                    </div>
                                                </a>
                                                @break
                                                @endif
                                            @endforeach
                                            <div class="product_content">
                                                <div class="product_price">৳ {{$fProduct->sale_Price}}</div>
                                                <div class="product_name">
                                                    <div><a href="{{URL::to('/product-view-by-id/'.$fProduct->id)}}">{{str_limit($fProduct->product_name_eng, 20)}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{URL::to('/product-view-by-id/'.$fProduct->id)}}">
                                                        <button class="product_cart_button">View
                                                            Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- End Slider Item -->
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel">
                                <div class="arrivals_slider slider">
                                    <!-- Slider Item -->
                                    @foreach($tsProducts as $tsProduct)
                                    @if($tsProduct->main_category_id == $mainCategory->id)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($tsProduct->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$tsProduct->id)}}">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset($image->medium_image)}}" alt="Product Image">
                                                    </div>
                                                </a>
                                                @break
                                                @endif
                                            @endforeach
                                            <div class="product_content">
                                                <div class="product_price">৳ {{$tsProduct->sale_Price}}</div>
                                                <div class="product_name">
                                                    <div><a href="{{URL::to('/product-view-by-id/'.$tsProduct->id)}}">{{str_limit($tsProduct->product_name_eng, 20)}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{URL::to('/product-view-by-id/'.$tsProduct->id)}}">
                                                        <button class="product_cart_button">View
                                                            Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- End Slider Item -->
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel">
                                <div class="arrivals_slider slider">
                                    <!-- Slider Item -->
                                    @foreach($trProducts as $trProduct)
                                    @if($trProduct->main_category_id == $mainCategory->id)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($trProduct->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$trProduct->id)}}">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset($image->medium_image)}}" alt="Product Image">
                                                    </div>
                                                </a>
                                                @break
                                                @endif
                                            @endforeach
                                            <div class="product_content">
                                                <div class="product_price">৳ {{$trProduct->sale_Price}}</div>
                                                <div class="product_name">
                                                    <div><a href="{{URL::to('/product-view-by-id/'.$trProduct->id)}}">{{str_limit($trProduct->product_name_eng, 20)}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{URL::to('/product-view-by-id/'.$trProduct->id)}}">
                                                        <button class="product_cart_button">View
                                                            Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- End Slider Item -->
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
