<!-- Top Bar -->
<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item" style="font-size: 14px; line-height: 32px;">
                    <div class="top_bar_icon"><img src="{{ asset('/customTemplate') }}/images/location.png" alt=""></div>{{$location['city'].', '.$location['country']}}
                </div>
                <div class="top_bar_contact_item" style="margin-top: -12px;">
                    <div class="top_bar_icon"><img src="{{ asset('/customTemplate') }}/images/mail.png" alt=""></div><a style="color: #ffffff; font-size: 14px;">{{$info->phone_number}}</a>
                </div>
                <div class="top_bar_content ml-auto" style="margin-top: -12px;">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="#" style="font-size: 14px; color: #fff;">English<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Japanese</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="font-size: 14px; color: #fff;">Track My Order<strong class="caret"></strong></a>
                                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 20px;">
                                    <form method="post" action="login" accept-charset="UTF-8" style="width: 220px">
                                        <input required id="trackEmail" style="margin-bottom: 15px;" class="form-control" type="Email" placeholder="Email" id="username" name="username">
                                        <input required id="trackNumber" style="margin-bottom: 15px;" class="form-control" type="number" placeholder="Invoice No." id="password" name="password">
                                        <input id="trackBtn" class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Submit"><br />
                                        <p id="trackStatus" style="text-align: center"></p>
                                    </form>
                                </div>
                            </li>
                            <script>
                                $('#trackBtn').click(function(e) {
                                    e.preventDefault()
                                    var email = $('#trackEmail').val()
                                    var number = $('#trackNumber').val()
                                    if (email != '' && number != '') {
                                        $.ajax({
                                            type: 'get',
                                            url: "{!! URL::to('/order-status-chack') !!}",
                                            datatype: 'html',
                                            data: {
                                                'email': email,
                                                'number': number
                                            },
                                            success: function(data) {
                                                $('#trackStatus').html(data)
                                                // alert(data)
                                            }
                                        });
                                    } else {
                                        alert('Please Fillup Input Field Perfectly')
                                    }
                                });
                            </script>
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        <div class="user_icon"><img src="{{ asset('/customTemplate') }}/images/user.svg" alt=""></div>
                        @if(Session::get('customer_id'))
                            <div><a href="#">{{Session::get('customer_name')}}</a></div>
                            <div><a style="font-size: 14px; color: #fff;" href="{{URL::to('/customer-logout')}}">Logout</a></div>
                        @else
                            <div><a style="font-size: 14px; color: #fff !important;" href="{{URL::to('/register-customer')}}">Register</a></div>
                            <div><a style="font-size: 14px; color: #fff !important;" href="{{URL::to('/register-customer')}}">Sign in</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Main -->
<div class="header_main">
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo">
                        <a href="{{URL::to('/')}}">
                            <img src="{{asset($logo->logo_image)}}">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            {{ Form::open(['url'=> '/search', 'method' => 'post', 'class' => 'header_search_form clearfix' ]) }}
                                <input type="search" id="searchBox" list="browsers" required="required" class="header_search_input" placeholder="Search for products...">
                                <datalist id="browsers">

                                </datalist>
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            @foreach($mainCategories as $mainCategory)
                                            <a id="abtn" href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}"><li>{{$mainCategory->category_name}}</li></a>
                                            @endforeach
                                        </ul>
                                        <script>
                                            $("#abtn").click(function() {
                                                if ($("#target").hasClass("disabled")) {
                                                    $("#target").removeClass("disabled");
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('customTemplate/images')}}/search.png" alt=""></button>
                            {{Form::close()}}
                            <script>
                                $('#searchBox').on('keyup', function() {
                                var name = $(this).val();
                                var op = '';
                                $.ajax({
                                    type: 'get',
                                    url: "{!! URL::to('/search-suggestion') !!}",
                                    datatype: 'html',
                                    data: {
                                        'name': name
                                    },
                                    success: function(data) {
                                        // console.log(data);
                                        for (var i = 0; i < data.length; i++) {
                                            op += '<option value="' + data[i].product_name_eng + '">';
                                        }
                                        $('#browsers').html(op)
                                    }
                                });
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon"><img src="{{ asset('/customTemplate') }}/images/heart.png" alt=""></div>
                        <div class="wishlist_content">
                            <div class="wishlist_text"><a href="#">Wishlist</a></div>
                            <div class="wishlist_count">0</div>
                        </div>
                    </div>
                    <!-- Cart -->
                        <a href="{{URL::to('/cart')}}">
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{asset('customTemplate/images')}}/cart.png" alt="">
                                        <div class="cart_count"><span>{{Cart::getTotalQuantity()}}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text">
                                            <a href="{{URL::to('/cart')}}">Cart</a>
                                        </div>
                                        <div class="cart_price">৳ {{Cart::getSubTotal()}}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Navigation -->
<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="main_nav_content d-flex flex-row">
                    <!-- Categories Menu -->
                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">Categories</div>
                        </div>
                        <ul class="cat_menu">
                            @foreach($mainCategories as $mainCategory)
                            <li class="hassubs">
                                <a href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}">{{$mainCategory->category_name}}<i class="fas fa-chevron-right"></i></a>
                                <ul>
                                    @foreach($subCategoriesApp as $subCategory)
                                        @if($subCategory->main_category_id == $mainCategory->id )
                                            <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}<i class="fas fa-chevron-right"></i></a></li>
                                        @endif
                                    @endforeach
                                    {{--<li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}<i class="fas fa-chevron-right"></i></a></li>--}}
                                </ul>
                            </li>
                            @endforeach
                            <li class="hassubs">
                                <a href="{{URL::to('/view-all-categories')}}">See More...</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Main Nav Menu -->
                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{URL::to('/')}}">Home<i class="fas fa-chevron-down"></i></a></li>
                            @foreach($dynamicpages as $dynamicpage)
                                <li><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_eng)}}">{{$dynamicpage->page_name_eng}}<i class="fas fa-chevron-down"></i></a></li>
                            @endforeach
                            <li class="hassubs">
                                <a href="#">Shopper<i class="fas fa-chevron-down"></i></a>
                                <ul style="top: 106% !important;">
                                    @if(Session::get('admin_id'))
                                    <li><a href="{{URL::to('/shopper-dash')}}">Shopper Dashboard<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{URL::to('/shopper-logout')}}">Shopper Logout<i class="fas fa-chevron-down"></i></a></li>
                                    @else
                                    <li><a href="{{URL::to('/shopper-register')}}">Shopper Register<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{URL::to('/shopper-login')}}">Shopper Login<i class="fas fa-chevron-down"></i></a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Menu -->

<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page_menu_content">
                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">
                        <li class="page_menu_item has-children">
                            <a href="#">Language<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                        </li>
                        <li class="page_menu_item">
                            <a href="#">Home<i class="fa fa-angle-down"></i></a>
                        </li>
                        @foreach($dynamicpages as $dynamicpage)
                            <li class="page_menu_item"><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_ban)}}">{{$dynamicpage->page_name_ban}}<i class="fa fa-angle-down"></i></a></li>
                        @endforeach
                        <li class="page_menu_item has-children">
                            <a href="#">Shopper<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                @if(Session::get('admin_id'))
                                <li><a href="{{URL::to('/shopper-dash')}}">Shopper Dashboard<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{URL::to('/shopper-logout')}}">Shopper Logout<i class="fas fa-chevron-down"></i></a></li>
                                @else
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-register')}}">Shopper Register<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-login')}}">Shopper Login<i class="fas fa-chevron-down"></i></a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <div class="menu_contact">
                        <div class="menu_contact_item">
                            <div class="menu_contact_icon"><img src="{{ asset('/customTemplate') }}/images/phone_white.png" alt=""></div>{{$info->phone_number}}
                        </div>
                        <div class="menu_contact_item">
                            <div class="menu_contact_icon"><img src="{{ asset('/customTemplate') }}/images/mail_white.png" alt=""></div>{{$info->email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>