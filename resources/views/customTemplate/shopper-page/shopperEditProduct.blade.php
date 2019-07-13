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
                        display: block;
                        width: 100% !important;
                        padding: .375rem .75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        color: #000;
                        background-color: #fff;
                        background-image: none;
                        background-clip: padding-box;
                        border: 1px solid #ced4da;
                        border-radius: .25rem;
                        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                    }
                    .btn {
                        min-width: 88px;
                        padding: 10px 14px;
                        margin-bottom: 10px;
                    }
                </style>
                <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                    <h3 style="overflow: hidden; text-align: center;">Edit Product</h3>
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
                                                        <div>
                                                            <ul class="nav nav-tabs" style="display: none;">
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
                                                            <div class="pmd-card mt-2">
                                                                <div class="pmd-card-body">
                                                                    <div class="tab-content">
                                                                        <div role="tablist" class="tab-pane active" id="bootstrap-home">
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Name</label>
                                                                                <input type="text" id="product_name_eng" required="" class="form-control" value="{{ $product->product_name_eng }}" name="product_name_eng">
                                                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Short Description</label>
                                                                                <textarea  required="" name="product_short_description_eng"  class="form-control">
                                                                                    {{ $product->prodcut_long_description_eng }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Long Description</label>
                                                                                <textarea id="editor" name="prodcut_long_description_eng" class="form-control">
                                                                                    {{ $product->prodcut_long_description_eng }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea required="" name="note_eng" class="form-control">
                                                                                    {{ $product->note_eng }}
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div role="tablist" class="tab-pane" id="bootstrap-about">
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">পণ্যের নাম</label>
                                                                                <input type="text" id="regular1" class="form-control" name="product_name_ban">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">ছোট বিবরণ</label>
                                                                                <textarea  name="prodcut_short_description_ban" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">দীর্ঘ বিবরণ</label>
                                                                                <textarea id="editor1" name="prodcut_long_description_ban" class="form-control" style="visibility: hidden; display: none;"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea name="note_ban" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">পণ্যের দাম</label>
                                                                                <input type="number" id="regular1" class="form-control" name="product_price_ban">
                                                                            </div>
                                                                        </div>
                                                                        <div role="tablist" class="tab-pane" id="bootstrap-work">
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Name</label>
                                                                                <input type="text" id="regular1" class="form-control" name="product_name_hin">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Short Description</label>
                                                                                <textarea name="product_short_description_hin" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Long Description</label>
                                                                                <textarea id="editor2" name="product_long_description_hin" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea name="note_hin" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="regular1" class="control-label">Product Price</label>
                                                                                <input type="number" id="regular1" class="form-control" name="product_price_hin">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Basic Bootstrap tab example -->
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Main Category</label>
                                                            <select id="product_cat" required class="form-control" name="main_category_id">
                                                                <option value="">--Select Main Category--</option>
                                                                @foreach($main_categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Sub Category</label>
                                                            <select id="product_sub_cat" required class="form-control" name="sub_category_id">
                                                                <option value="0">-Select Sub Category-</option>
                                                                @foreach($sub_categories as $sub_cat)
                                                                    <option value="{{ $sub_cat->id }}">{{ $sub_cat->sub_category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Brand</label>
                                                            <select id="" class="form-control" required name="product_brand">
                                                                <option value="0">--Select Brand--</option>
                                                                @foreach($brands as $brand)
                                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1" name="discount" type="checkbox" class="pm-ini">
                                                                    <span class="pmd-checkbox-label">&nbsp</span>
                                                                    <i class="input-helper"></i>
                                                                    Discount
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input name="offer" value="{{ $product->offer}}" id="offer" type="checkbox" class="pm-ini"><span class="pmd-checkbox-label">&nbsp;</span>
                                                                    <i class="input-helper"></i>
                                                                    Offer
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Product Quantity</label>
                                                            <input type="number" required="" class="form-control" value="{{ $product->product_qty }}" name="product_qty">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Old Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" id="old_Price" class="form-control" name="old_Price" value="{{ $product->old_Price }}">
                                                </div>
                                                <label class="control-label">Sale Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" id="sale_Price" class="form-control" name="sale_Price" value="{{ $product->sale_Price }}">
                                                </div>
                                            </div>

                                            <div class="tab-content">
                                                <div class="form-group">
                                                    <label class="control-label">Product Type</label>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active" href="#bootstrap-general" aria-controls="general" role="tab" data-toggle="tab">General</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" href="#bootstrap-downlable" aria-controls="downlable" role="tab" data-toggle="tab">Downloadable</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div role="tablist" class="tab-pane active" id="bootstrap-general">
                                                    <div class="container">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Stock Status</label>
                                                                    <select class="form-control" name="stock_status" id="stock_status">
                                                                        <option value="0">Select Stock Status</option>
                                                                        <option value="2">In Stock</option>
                                                                        <option value="1">Stock Out</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Main/Total QTY</label><br />
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control" name="main_qty" value="{{ $product->main_qty }}" placeholder="Enter Your Main Product QTY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tablist" class="tab-pane" id="bootstrap-downlable">
                                                    <div class="form-group">
                                                        <label for="regular1" class="control-label">Download link</label>
                                                        <input type="text" class="form-control" name="download_link" value="{{ $product->download_link }}" placeholder="Enter Download link">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Others</label>
                                                <input type="text" class="form-control"  name="size" value="{{ $product->size }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Others</label>
                                                <input type="text" class="form-control"  name="others" value="{{ $product->others }}">
                                            </div>

                                            <div style="float: right;">
                                                <button type="submit" class="btn btn-success">Add New Product</button>
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

<script src="{{asset('/customTemplate/js/')}}/jquery-3.3.1.min.js"></script>
<script src="http://localhost/BK-E-commerce/public/backEnd/assets/ckeditor/ckeditor.js"></script>
<script src="http://localhost/BK-E-commerce/public/backEnd/assets/ckeditor/samples/js/sample.js"></script>

<script type="text/javascript">
    initSample();
    CKEDITOR.replace( 'prodcut_long_description_ban' );
    CKEDITOR.replace( 'product_long_description_hin' );
</script>

<script type="text/javascript">
    document.forms['editShopper'].elements['main_category_id'].value ={{ $product->main_category_id}};
    document.forms['editShopper'].elements['sub_category_id'].value ={{ $product->sub_category_id}};
    document.forms['editShopper'].elements['product_brand'].value ={{ $product->product_brand}};
    document.forms['editShopper'].elements['offer'].value ={{ $product->offer}};
    document.forms['editShopper'].elements['stock_status'].value = {{$product->stock_status}}
</script>
@endsection
