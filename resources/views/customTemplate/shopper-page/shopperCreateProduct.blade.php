@extends('customTemplate.index')

@section('title', 'Shopper Create Product')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
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
                    <h3 style="overflow: hidden; text-align: center;">Add Product</h3>
                    <form method="POST" action="{{ route('/shopper-save-product')}}" name="editShopper" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
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
                                                                                <input type="text" id="product_name_eng" required="" class="form-control" name="product_name_eng">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Short Description</label>
                                                                                <textarea id="product_short_description_eng" required="" name="product_short_description_eng" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Long Description</label>
                                                                                <textarea id="editor" name="prodcut_long_description_eng" class="form-control"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Note</label>
                                                                                <textarea required="" name="note_eng" class="form-control"></textarea>
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
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Sub Category</label>
                                                            <select id="product_sub_cat" required class="form-control" name="sub_category_id">
                                                                <option value="0">-Select Sub Category-</option>
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
                                                                    <input value="1" name="offer" type="checkbox" class="pm-ini"><span class="pmd-checkbox-label">&nbsp;</span>
                                                                    <i class="input-helper"></i>
                                                                    Offer
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Product Quantity</label>
                                                            <input type="number" required="" class="form-control" name="product_qty">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Old Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" id="old_Price" class="form-control" name="old_Price">
                                                </div>
                                                <label class="control-label">Sale Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" id="sale_Price" class="form-control" name="sale_Price">
                                                </div>
                                            </div>
                                            <div id="price">
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Whole Sell Minimum & Maximum Product Qty & Price</label>
                                                    <div class="col-md-12">
                                                        <div class="row price">
                                                            <div class="col-md-2 col-sm-2">
                                                                <input style="margin-bottom: 10px;" type="number" min="1" id="regular1" class="form-control" name="price_first_number[]">
                                                            </div>
                                                            <div class="col-md-2 col-sm-2">
                                                                <input style="margin-bottom: 10px;" type="number" min="2" id="regular1" class="form-control" name="price_last_number[]">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input style="margin-bottom: 10px;" type="number" min="1" id="regular1" class="form-control" name="first_to_last_number_price[]">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a onclick="addPriceRow()" class="btn btn-success" style="cursor: pointer;padding: 5px 10px;">Add</a>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                        <option>Select Stock Status</option>
                                                                        <option value="1">In Stock</option>
                                                                        <option value="0">Stock Out</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Main/Total QTY</label><br />
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control" name="main_qty" id="main_qty" placeholder="Enter Your Main Product QTY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tablist" class="tab-pane" id="bootstrap-downlable">
                                                    <div class="form-group">
                                                        <label for="regular1" class="control-label">Download link</label>
                                                        <input type="text" class="form-control" name="download_link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Product Attributes</label>
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-12"  style="margin-bottom: 20px;">
                                                            <label class="text-uppercase">Color</label>
                                                            <div class="form-group">
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="1">
                                                                    <span class="checkmark" style="background-color: #800080;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]"  value="2">
                                                                    <span class="checkmark" style="background-color: #FF00FF;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="3">
                                                                    <span class="checkmark" style="background-color: #000080;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="4">
                                                                    <span class="checkmark" style="background-color: #0000FF;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="5">
                                                                    <span class="checkmark" style="background-color: #008080;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="6">
                                                                    <span class="checkmark" style="background-color: #008000;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="7">
                                                                    <span class="checkmark" style="background-color: #808000;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="8">
                                                                    <span class="checkmark" style="background-color: #FFFF00;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="9">
                                                                    <span class="checkmark" style="background-color: #800000;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="10">
                                                                    <span class="checkmark" style="background-color: #FF0000;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="11">
                                                                    <span class="checkmark" style="background-color: #000000;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="12">
                                                                    <span class="checkmark" style="background-color: #808080;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="13">
                                                                    <span class="checkmark" style="background-color: #C0C0C0;"></span>
                                                                </label>
                                                                <label class="hello">
                                                                    <input type="checkbox" name="color_name[]" value="14">
                                                                    <span class="checkmark" style="background-color: #FFFFFF;"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="text-uppercase">Size</label>
                                                            <input type="text" class="form-control"  name="size">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Others</label>
                                                <input type="text" class="form-control"  name="others">
                                            </div>
                                            <!-- Bootstrap Selectbox -->
                                            <div id="images">
                                                <div class="form-group">
                                                    <label for="product_image" class="control-label">Product Image</label><br>
                                                    <input type="file" required multiple name="product_image[]" accept="image/*">
                                                    <a onclick="addImgRow()" class="btn btn-success" style="cursor: pointer;padding: 5px 10px;">Add</a><br>
                                                </div>
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


    // =======Append addPriceRow=========
    function addPriceRow() {
        var price = '<div id="PriceParentDiv" class="form-group">'+
            '<div class="col-md-12">'+
            '<div class="row price">'+
            '<div class="col-md-2">'+
            '<input type="number" min="1" id="regular1" class="form-control" name="price_first_number[]">'+
            '</div>'+
            '<div class="col-md-2">'+
            '<input type="number" min="2" id="regular1" class="form-control" name="price_last_number[]">'+
            '</div>'+
            '<div class="col-md-6">'+
            '<input type="number" min="1" id="regular1" class="form-control" name="first_to_last_number_price[]">'+
            '</div>'+
            '<div class="col-md-2">'+
            '<a  class="btn btn-danger removePrice" style="cursor: pointer;padding: 5px 10px;">Remove</a><br>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>';
        $('#price').append(price);
    };
    $(document).on('click', '.removePrice', function(e){
        e.preventDefault();
        $('#PriceParentDiv').remove(); //Remove images field html
    });
    <!-- =======Append addPriceRow=========-->


    // =======Append addDPriceRow=========//
    function addDPriceRow() {
        var dprice = '<div id="DPriceParentDiv" class="form-group">'+
            '<div class="col-md-12">'+
            '<div class="row price">'+
            '<div class="col-md-2">'+
            '<input type="number" min="1" id="regular1" class="form-control" name="price_first_number[]">'+
            '</div>'+
            '<div class="col-md-2">'+
            '<input type="number" min="2" id="regular1" class="form-control" name="price_last_number[]">'+
            '</div>'+
            '<div class="col-md-6">'+
            '<input type="number" min="1" id="regular1" class="form-control" name="first_to_last_number_price[]">'+
            '</div>'+
            '<div class="col-md-2">'+
            '<a  class="btn btn-danger dremovePrice" style="cursor: pointer;padding: 5px 10px;">Remove</a><br>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>';
        $('#dprice').append(dprice);
    };
    $(document).on('click', '.dremovePrice', function(e){
        e.preventDefault();
        $('#DPriceParentDiv').remove(); //Remove images field html
    });

    function addImgRow() {
        var images = '<div id="imgParentDiv" class="form-group">'+
            '<input type="file" id="regular1" required="" multiple="" name="product_image[]" accept="image/*">'+
            '<a  class="btn btn-danger removeImg" style="cursor: pointer;padding: 5px 10px;">Remove</a><br>'+
            '</div>';
        $('#images').append(images);
    };

    $(document).on('click', '.removeImg', function(e){
        e.preventDefault();
        $('#imgParentDiv').remove(); //Remove images field html
    });

    <!--=======Append addPriceRow=========-->
    function addPoductSizeRow() {
        var size = '<div id="sizeParentDiv" class="form-group">'+
            '<div class="col-md-12">'+
            '<div class="row">'+
            '<div class="col-md-10">'+
            '<input type="text" id="regular1" class="form-control" name="product_size[]">'+
            '</div>'+
            '<div class="col-md-2">'+
            '<a  class="btn btn-danger removeSize" style="cursor: pointer;padding: 5px 10px;">Remove</a>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>';
        $('#size').append(size);
    };

    $(document).on('click', '.removeSize', function(e){
        e.preventDefault();
        $('#sizeParentDiv').remove(); //Remove size field html
    });

</script>

<!-- Category script -->
<script>
    $(document).ready(function(){

        $(document).on('change','#product_cat_up', function () {
            var cat_id = $(this).val();
            var op= " ";
            $.ajax({
                type:'get',
                url: '{!! route("/shoper-subcat-categories") !!}',
                datatype: 'html',
                data:{'id':cat_id},

                success:function (data) {
                    op +='<option  value="">--Select Sub Category--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].sub_category_name+'</option>';
                    }
                    $('#product_sub_cat_up').html(op);
                }
            });
        });

        $(document).on('change','#product_cat', function () {
            var cat_id = $(this).val();
            var op= " ";
            $.ajax({
                type:'get',
                url: '{!! route("/shoper-subcat-categories") !!}',
                datatype: 'html',
                data:{'id':cat_id},
                success:function (data) {
                    op +='<option  value="">--Select Sub Category--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].sub_category_name+'</option>';
                    }
                    $('#product_sub_cat').html(op);
                }
            });
        });


    });
</script>
<!-- Category script -->
@endsection
