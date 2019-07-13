@extends('customTemplate.affiliatePage.afflite-category-master')
@section('category')
    <div class="col-sm-9" style="margin-top: 0px;">
        <div class="row">
            <h2 class="text-left"><em>Category Product</em></h2>
            <hr/>
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card" style="width:400px">
                        @foreach($images as $image)
                            @if($product->id == $image->product_id)
                                <a href="{!! url('/afflite-product-view/'.$product->id) !!}"><img class="card-img-top" src="{!!asset($image->medium_image) !!}" alt="Card image" style="width:40%; border-right: 2px solid red;"></a>
                                @break
                            @endif
                        @endforeach
                        <div class="card-body" style="margin-left: 20px; margin-top: 10px;">
                            <h4 class="card-title text-left">{!! $product->product_name_eng!!}</h4>
                            <p class="card-text" style="width: 230px; margin-top: 15px;">TK.{!! $product->product_price_eng !!}</p>
                            {{--<a href="{!! url('/afflite-product-view/'.$product->id) !!}" name="btn" class="btn btn-success btn-block" style="margin-top: 15px; width: 130px;">Product Detail</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <center>{{ $products->links() }}</center>
    @endsection