@extends('customTemplate.affiliatePage.master')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
        <div class="row">
            <h1 class="text-center text-info">== Enjoy Your Shopping ==</h1>
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card" style="width:400px">
                        @foreach($images as $image)
                            @if($product->id == $image->product_id)
                                <img class="card-img-top" src="{!!asset($image->medium_image) !!}"
                                     alt="Card image" style="width:50%">
                                @break
                            @endif
                        @endforeach
                        <div class="card-body" style="margin-left: 50px; margin-top: 10px;">
                            <h4 class="card-title">{!! $product->product_name_eng!!}</h4>
                            <p class="card-text" style="width: 230px; margin-top: 15px;">
                                TK.{!! $product->product_price_eng !!}</p>
                            <a href="{!! url('/afflite-product-view/'.$product->id) !!}" name="btn"
                               class="btn btn-success btn-block" style="margin-top: 15px; width: 130px;">Product
                                Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
    @endsection