@extends('customTemplate.index')
@section('title', 'Shopper Edit Product')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row mt-5" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <style type="text/css">
                    .form-control {
                        color: #000;
                    }
                    .btn {
                        min-width: 88px;
                        padding: 10px 14px;
                        margin-bottom: 10px;
                    }
                </style>
                <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                    <h3 style="overflow: hidden; text-align: center;">Shopper Edit Product</h3>
                    <form method="POST" action="{{ URL::to('/shopper-update-product')}}" name="editShopper" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="component-box">
                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <!-- Textarea -->
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="component-box">
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Main Category</label>
                                                            <select id="product_cat" required="" class="form-control" name="main_category_id">
                                                                <option value="">--Select Main Category--</option>
                                                                @foreach($main_categories as $main_category)
                                                                <option value="{{ $main_category->id }}">{{ $main_category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Sub Category</label>
                                                            <select id="product_sub_cat" required="" class="form-control" name="sub_category_id">
                                                                <option value="">-Select Sub Category-</option>
                                                                @foreach($sub_categories as $sub_category)
                                                                <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Brand</label>
                                                            <select id="" class="form-control" required="" name="product_brand">
                                                                <option value="">--Select Brand--</option>
                                                                @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Offer</label>
                                                            <select id="0" class="form-control" name="offer_id">
                                                                <option value="">--Select Offers--</option>
                                                                <option value="0">page name eng3</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1" name="top_sellers" type="checkbox" class="pm-ini"><span class="pmd-checkbox-label">&nbsp;</span>
                                                                    <i class="input-helper"></i>
                                                                    Top Seller
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1" name="special" type="checkbox" class="pm-ini"><span class="pmd-checkbox-label">&nbsp;</span>
                                                                    <i class="input-helper"></i>
                                                                    Special
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1" name="hot_product" type="checkbox" class="pm-ini"><span class="pmd-checkbox-label">&nbsp;</span>
                                                                    <i class="input-helper"></i>
                                                                    Hot Product
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1" name="top_rated" type="checkbox" class="pm-ini"><span class="pmd-checkbox-label">&nbsp;</span>
                                                                    <i class="input-helper"></i>
                                                                    Top Rated
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Product Quantity</label>
                                                            <input type="number" required="" class="form-control" name="product_qty" value="{{ $product->product_qty }}">
                                                            <input type="hidden"  name="product_id" value="{{ $product->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Ex. Date</label>
                                                            <input type="date" class="form-control" name="ex_date" value="{{ $product->ex_date }}">
                                                        </div>
                                                        <div>
                                                            Tab panes
                                                            <ul class="nav nav-tabs">
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link active" href="#bootstrap-home" aria-controls="home" role="tab" data-toggle="tab">English</a>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link" href="#bootstrap-about" aria-controls="about" role="tab" data-toggle="tab">Bangla</a>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link" href="#bootstrap-work" aria-controls="work" role="tab" data-toggle="tab">Hindi</a>
                                                                </li>
                                                            </ul>
                                                            <div class="pmd-card">
                                                                <br>
                                                                <div class="pmd-card-body">
                                                                    <div class="tab-content">
                                                                        <div role="tablist" class="tab-pane active" id="bootstrap-home">
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Name</label>
                                                                                <input type="text" id="product_name_eng" required="" class="form-control" name="product_name_eng" value="{{ $product->product_name_eng }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Price</label>
                                                                                <input type="number" required="" id="product_price_eng" class="form-control" name="product_price_eng" value="{{ $product->product_price_eng }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea required="" name="note_eng" class="form-control">
                                                                                   {{ $product->note_eng }}
                                                                                </textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label">Short Description</label>
                                                                                <textarea id="product_short_description_eng" required="" name="product_short_description_eng" class="form-control">
                                                                                    {{ $product->product_short_description_eng }}
                                                                                </textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label">Long Description</label>
                                                                                <textarea id="editor" name="prodcut_long_description_eng" class="form-control">
                                                                                    {{ $product->prodcut_long_description_eng }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Color</label>
                                                                                <input type="text" id="product_color_eng" required="" class="form-control" name="product_color_eng" value="{{ $product->product_color_eng }}">
                                                                            </div>
                                                                        </div>

                                                                        <div role="tablist" class="tab-pane" id="bootstrap-about">
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">পণ্যের নাম</label>
                                                                                <input type="text" id="regular1" class="form-control" name="product_name_ban" value="{{ $product->product_name_ban }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">পণ্যের দাম</label>
                                                                                <input type="number" id="regular1" class="form-control" name="product_price_ban" value="{{ $product->product_price_ban }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea name="note_ban" class="form-control">
                                                                                    {{ $product->note_ban }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">ছোট বিবরণ</label>
                                                                                <textarea  name="prodcut_short_description_ban" class="form-control">
                                                                                    {{ $product->prodcut_short_description_ban }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">দীর্ঘ বিবরণ</label>
                                                                                <textarea id="editor1" name="prodcut_long_description_ban" class="form-control">
                                                                                    {{ $product->prodcut_long_description_ban }}
                                                                                </textarea>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">পণ্য রঙ</label>
                                                                                <input type="text" id="regular1" class="form-control" name="product_color_ban" value="{{ $product->product_color_ban }}">
                                                                            </div>
                                                                        </div>
                                                                        <div role="tablist" class="tab-pane" id="bootstrap-work">
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Country Name</label>
                                                                                <input type="text" id="regular1" class="form-control" name="product_name_hin" value="{{ $product->product_name_hin }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Price</label>
                                                                                <input type="number" id="regular1" class="form-control" name="product_price_hin" value="{{ $product->product_price_hin }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea name="note_hin" class="form-control">
                                                                                   {{ $product->note_hin }}
                                                                                </textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label">Short Description</label>
                                                                                <textarea id="editor3" name="product_short_description_hin" class="form-control">
                                                                                    {{ $product->product_short_description_hin }}
                                                                                </textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label">Long Description</label>
                                                                                <textarea id="editor2" name="product_long_description_hin" class="form-control">
                                                                                    {{ $product->product_long_description_hin }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Color</label>
                                                                                <input type="text" id="regular1" class="form-control" name="product_color_hin" value="{{ $product->product_color_hin }}">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="float: right;">
                                                <button type="submit" class="btn btn-success">Update Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection

@section('js')
<script src="{{asset('/customTemplate/js/')}}/jquery-3.3.1.min.js"></script>
<script src="{{asset('/customTemplate/styles/')}}/bootstrap4/popper.js"></script>
<script src="{{asset('/customTemplate/styles/')}}/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('/customTemplate/plugins/')}}/greensock/TweenMax.min.js"></script>
<script src="{{asset('/customTemplate/plugins/')}}/greensock/TimelineMax.min.js"></script>
<script src="{{asset('/customTemplate/plugins/')}}/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('/customTemplate/plugins/')}}/greensock/animation.gsap.min.js"></script>
<script src="{{asset('/customTemplate/plugins/')}}/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('/customTemplate/plugins/')}}/easing/easing.js"></script>
{{--<script src="{{asset('/customTemplate/js/')}}/contact_custom.js"></script>--}}
{{--<script src="{{asset('/customTemplate/js/')}}/contact_custom.js"></script>--}}

<script src="http://localhost/BK-E-commerce/public/backEnd/assets/ckeditor/ckeditor.js"></script>
<script src="http://localhost/BK-E-commerce/public/backEnd/assets/ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="http://localhost/BK-E-commerce/public/backEnd/assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    initSample();
    CKEDITOR.replace('prodcut_long_description_ban');
    CKEDITOR.replace('product_long_description_hin');
</script>
<script type="text/javascript">
    // document.forms['editShopper'].elements['main_category_id'].value ={{ $product->main_category_id}};
    // document.forms['editShopper'].elements['sub_category_id'].value ={{ $product->sub_category_id}};
    // document.forms['editShopper'].elements['product_brand'].value ={{ $product->product_brand}};
</script>
@endsection
