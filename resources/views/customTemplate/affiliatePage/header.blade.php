<div class="col-sm-12" style="border: 0px solid #000000;">
    <div class="col-sm-4" style="margin-left: 5px;">
        <form class="form-inline" action="{!! url('/search-product') !!}" method="GET">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="product_search" id="product_search"
                           value="{{ request()->input('product_search') }}" class="form-control"
                           id="exampleInputAmount" placeholder="Searching..">
                </div>
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="col-sm-4" style="border: 0px solid #000000;">
        <div class="top_bar_user" style="border: 0px solid #000000; float: right; width: 200px;">
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
    </div>
    <div class="col-sm-3">
        <div class="cart_count" style="float: right; font-size: 20px; border: 0px solid #000000; width: 100px;">
            <a href="{!! url('/afflite-cart-page') !!}"> <b class="text-primary" style="float: right;">Cart
                    : {{Cart::getTotalQuantity()}}</b></a><br/>
            <strong style="font-size: 20px; float:right;">৳ {{Cart::getSubTotal()}}</strong>
        </div>
    </div>

</div>