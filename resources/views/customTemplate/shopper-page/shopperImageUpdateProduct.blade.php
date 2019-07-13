@extends('customTemplate.index')

@section('title', 'Shopper Product Image Update')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_responsive.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<style type="text/css">
    .contact_form{
        color: #444;
        font-family: 'Open Sans', sans-serif;
    }
    #message{
        padding: 18px;
        color: #155724 !important;
        background-color: #d4edda;
        border-color: #c3e6cb;
        border-radius: 5px;
    }
</style>

<div class="contact_form">
    <div class="container">
        <div class="row">
            
            <span id="message" class="text text-success"></span>
            
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            @if(Session::has('messageD'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('messageD')}}
                </div>
            @endif
        </div>
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="table-responsive pmd-card pmd-z-depth">
                    <table class="table table-mc-red pmd-table">
                        <tbody>
                            <tr>
                                @foreach($images as $key => $product_image)
                                <th id="{{$product_image->id}}">
                                    <img style="height: 100px; width: 100px"  src="{{asset($product_image->medium_image)}}"><br>
                                    <button  id="btnImage" onclick="deleteImage({{$product_image->id}})" class="btn btn-danger">Remove</button>
                                </th>
                                @endforeach
                            </tr>
                            <tr>
                                @php
                                if (isset($key)){

                                }else{
                                $key= 1;
                                }
                                @endphp
                                {{Form::open(['url'=> 'update-image', 'id' => 'uploadImage', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                                <th colspan="{{$key+1}}">
                                    <input type="hidden" name="productId"  value="{{$product->id}}">
                                    <input type="file" id="productImagefield" multiple  name="product_image[]" accept="image/*">
                                    <input id="imageBtn" disabled style="float: right" type="submit" class="btn btn-success right" value="Add Image">
                                </th>
                                {{Form::close()}}
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-mc-red pmd-table">
                        <tbody>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Name</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center">{{$product->product_name_eng}}</th>
                                <th style="text-align: center">{{$product->product_name_ban}}</th>
                                <th style="text-align: center">{{$product->product_name_hin}}</th>
                                <th style="text-align: center">Other</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Price</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center">{{$product->product_price_eng}}</th>
                                <th style="text-align: center">{{$product->product_price_ban}}</th>
                                <th style="text-align: center">{{$product->product_price_hin}}</th>
                                <th style="text-align: center">Other</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Qty</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: center">{{$product->product_qty}}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Status</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center">Top Sellers : {{$product->top_sellers == 1 ? 'Yes' : 'No'}}</th>
                                <th style="text-align: center">Feature : {{$product->special == 1 ? 'Yes' : 'No'}}</th>
                                <th style="text-align: center">Hot Product : {{$product->hot_product == 1 ? 'Yes' : 'No'}}</th>
                                <th style="text-align: center">Top Rated : {{$product->top_rated == 1 ? 'Yes' : 'No'}}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Main Category, Sub Category &amp; Brand Name3</h3>
                                </th>
                            </tr>
                            <tr>
                                @foreach($main_categories as $main_category)
                                @if($product->main_category_id == $main_category->id)
                                <th style="text-align: center">{{$main_category->category_name}}</th>
                                @break
                                @endif
                                @endforeach
                                @foreach($sub_categories as $sub_category)
                                @if($product->sub_category_id == $sub_category->id)
                                <th style="text-align: center">{{$sub_category->sub_category_name}}</th>
                                @break
                                @endif
                                @endforeach
                                @foreach($brands as $brand)
                                @if($product->product_brand == $brand->id)
                                <th style="text-align: center">{{$brand->brand_name}}</th>
                                @break
                                @endif
                                @endforeach
                                <th style="text-align: center">Publication Status: {{$product->status == 1 ? 'Published' : 'Unpublished'}}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Short Description (English)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify">{!! $product->product_short_description_eng !!}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Short Description (Bangla)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify">{!! $product->prodcut_short_description_ban !!}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Short Description (Hindi)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: center">{!! $product->product_short_description_hin !!}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Long Description (English)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify">{!! $product->prodcut_long_description_eng !!}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Long Description (Bangla)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify">{!! $product->prodcut_long_description_ban !!}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Long Description (Hindi)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify">{!! $product->product_long_description_hin !!}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Color</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center">{{$product->product_color_eng}}</th>
                                <th style="text-align: center">{{$product->product_color_ban}}</th>
                                <th style="text-align: center">{{$product->product_color_hin}}</th>
                                <th style="text-align: center">Other</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Size</h3>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align: center">
                                    @foreach($size as $size)
                                    @if($size->product_id == $product->id)
                                    {{$size->product_size_name }},
                                    @endif
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Seller Name</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: center">{{$adminInfo->user_name}}</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Seller Address</h3>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align: center">
                                    {{$adminInfo->address}}, {{$adminInfo->sub_district_name}}, {{$adminInfo->district_name}}, {{$adminInfo->division_name}}, {{$adminInfo->country_name}}.
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
<script src="{{asset('/customTemplate/js/')}}/jquery-3.3.1.min.js"></script>

<script>
   function deleteImage(id) {
       confirm('Are you sure?? you want to delete this image')
       $.ajax({
           type:'get',
           url: "{!! route('/shopper-delete-image') !!}",
           datatype: 'html',
           data:{'id':id},

           success:function (data) {
               $('#'+id).hide();
//               window.location.reload();
               $('#message').html('Image Deleted Successfully !!!');

           }
       });
   }
</script>

<script>
    $(document).ready(function () {
       $('#productImagefield').change(function () {
           $('#imageBtn').removeAttr('disabled');
       });
    })
</script>
@endsection

