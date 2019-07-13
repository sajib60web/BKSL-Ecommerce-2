@extends('customTemplate.index')

@section('title', 'Product Details')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/product_responsive.css">
<style type="text/css" media="screen">
.cart_title {
    font-size: 30px;
    font-weight: 500;
} 
.order_total {
    width: 100%;
    height: 60px;
    margin-top: 30px;
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    padding-right: 46px;
    padding-left: 15px;
}
.order_total_amount {
    display: inline-block;
    font-size: 18px;
    font-weight: 500;
    margin-left: 26px;
    line-height: 60px;
}
</style>
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Main Categories</div>
                </div>
            </div>
        </div>
        <div class="row" >
            @foreach($mainCategories as $mCategory)
                <div class="col-md-4">
                    <a href="{{URL::to('/view-sub-category/'.$mCategory->id)}}">
                        <div class="order_total">
                            <div class="order_total_content text-md-center">
                                <div class="order_total_amount" id="subTotal">{{$mCategory->category_name}}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
</div>

<script src="{{ asset('/customTemplate') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/customTemplate') }}/js/product_custom.js"></script>
@endsection
