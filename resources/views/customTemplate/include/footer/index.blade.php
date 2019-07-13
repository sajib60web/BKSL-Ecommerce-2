<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="viewed_slider_container">
                    <!-- Recently Viewed Slider -->
                    <div class="owl-carousel owl-theme viewed_slider">
                        <!-- Recently Viewed Item -->
                        @foreach($view_totals as $view_total)
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                @foreach($images as $image)
                                    @if($view_total->id == $image->product_id)
                                    <a href="{{URL::to('/product-view-by-id/'.$view_total->id)}}">
                                        <div class="viewed_image">
                                            <img src="{{asset($image->medium_image)}}" alt="Product Image">
                                        </div>
                                    </a>
                                    @break
                                    @endif
                                @endforeach
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">৳ {{ $view_total->sale_Price }}<span>৳ {{ $view_total->old_Price }}</span></div>
                                    <div class="viewed_name"><a href="{{URL::to('/product-view-by-id/'.$view_total->id)}}">{{ str_limit($view_total->product_name_eng, 16) }}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Recently Viewed Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">
                    <!-- Brands Slider -->
                    <div class="owl-carousel owl-theme brands_slider">
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_1.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_2.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_3.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_4.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_5.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_6.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_7.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/customTemplate') }}/images/brands_8.jpg" alt=""></div>
                        </div>
                    </div>
                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{ asset('/customTemplate') }}/images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="{{URL::to('/')}}"><img src="{{asset($logo->logo_image)}}"/></a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us</div>
                    <div class="footer_phone">{{$info->phone_number}}</div>
                    <div class="footer_contact_text">
                        <p style="color: #ffffff;">{{$info->address}}</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="{{$info->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$info->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{$info->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{$info->google_link}}"><i class="fab fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" >
                <div class="footer_column">
                    <div class="footer_title">Popular Brands</div>
                    <ul class="footer_list">
                        @foreach($brands as $brand)
                            <li><a style="color: #ffffff;" href="#">{{$brand->brand_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3" style="margin-right: 0">
                <div class="footer_column">
                    <div class="footer_title">Popular Categories</div>
                    <ul class="footer_list">
                        @foreach($mainCategories as $main_category)
                        <li><a style="color: #ffffff;" href="#">{{$main_category->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content" style="color: #fff;">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://banglakings.com" target="_blank">Bangla Kings Software</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="{{ asset('/customTemplate') }}/images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('/customTemplate') }}/images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('/customTemplate') }}/images/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('/customTemplate') }}/images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>