<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>
<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">
<style>
    .hello {
        margin: 2px;
        border: 2px solid #ddd;
        height: 30px;
        width: 30px;
        float: left;
        display: block;
        position: relative;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .hello input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #00FF00;
    }
    .hello:hover input ~ .checkmark {
        background-color: #ccc;
    }
    .hello input:checked ~ .checkmark {
        background-color: #2196F3;
        -webkit-box-shadow: 0px 0px 11px 1px #495559;
        box-shadow: 0px 0px 11px 1px #495559;
        -moz-box-shadow:    1px 2px 19px 6px #FF6486;
    }
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        border: 2px solid green;
    }
    .hello input:checked ~ .checkmark:after {
        display: block;
    }
    .hello .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid #00FF00;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Product</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Product</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/save-product', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
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
                                                        @if ($errors->has('main_category_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('main_category_id') }}</strong>
                                                        </span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Sub Category</label>
                                                            <select id="product_sub_cat" required class="form-control" name="sub_category_id">
                                                                <option value="">-Select Sub Category-</option>

                                                            </select>
                                                        </div>
                                                        @if ($errors->has('sub_category_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('sub_category_id') }}</strong>
                                                        </span>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Brand</label>
                                                            <select id="" class="form-control" required name="product_brand">
                                                                <option value="">--Select Brand--</option>
                                                                @foreach($brands as $brand)
                                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>

                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('product_brand'))
                                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('product_brand') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Offer</label>
                                                            <select id="0" class="form-control"  name="offer_id">
                                                                <option value="">--Select Offers--</option>
                                                                @foreach($offers as $offer)
                                                                    <option value="{{$offer->id}}">{{$offer->page_name_eng}}</option>

                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('product_brand'))
                                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('product_brand') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1" name="top_sellers"  type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Top Seller
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="special"  type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Special
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="hot_product"  type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Hot Product
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="top_rated"  type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Top Rated
                                                                </label>

                                                            </div>
                                                        </div>
                                                        @if ($errors->has('top_sellers'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $errors->first('top_sellers') }}</strong>
                                                             </span>
                                                        @endif
                                                        @if ($errors->has('special'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $errors->first('special') }}</strong>
                                                             </span>
                                                        @endif
                                                        @if ($errors->has('hot_product'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $errors->first('hot_product') }}</strong>
                                                             </span>
                                                        @endif
                                                        @if ($errors->has('top_rated'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $errors->first('top_rated') }}</strong>
                                                             </span>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Product Quantity</label>
                                                            <input type="number" required class="form-control" name="product_qty">
                                                        </div>
                                                        @if ($errors->has('product_qty'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('product_qty') }}</strong>
                                                            </span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Ex. Date</label>
                                                            <input type="date" required  id="regular1" class="form-control" name="ex_date">
                                                        </div>
                                                        @if ($errors->has('ex_date'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('ex_date') }}</strong>
                                                            </span>
                                                        @endif


                                                        <div>
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li role="presentation" class="active"><a href="#bootstrap-home" aria-controls="home" role="tab" data-toggle="tab">English</a></li>
                                                                <li role="presentation"><a href="#bootstrap-about" aria-controls="about" role="tab" data-toggle="tab">Bangla</a></li>
                                                                <li role="presentation"><a href="#bootstrap-work" aria-controls="work" role="tab" data-toggle="tab">Hindi</a></li>
                                                            </ul>
                                                            <div class="pmd-card">
                                                                <div class="pmd-card-body">
                                                                    <!-- Tab panes -->
                                                                    <div class="tab-content">
                                                                        @include('backEnd.includes.product.include.product_eng')
                                                                        @include('backEnd.includes.product.include.product_ban')
                                                                        @include('backEnd.includes.product.include.product_hin')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!--Basic Bootstrap tab example end-->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Old Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" id="old_Price" class="form-control" name="old_Price">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Sale Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" id="sale_Price" class="form-control" name="sale_Price">
                                                </div>
                                            </div>

                                            <div id="price">
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Whole Sell Minimum & Maximum Product Qty & Price</label>
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <input type="number" min="1" id="regular1" class="form-control" name="price_first_number[]">
                                                        </div>
                                                        @if ($errors->has('price_first_number'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('price_first_number') }}</strong>
                                                            </span>
                                                        @endif
                                                        <div class="col-md-2">
                                                            <input type="number" min="2" id="regular1" class="form-control" name="price_last_number[]">
                                                        </div>
                                                        @if ($errors->has('price_last_number'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('price_last_number') }}</strong>
                                                            </span>
                                                        @endif
                                                        <div class="col-md-6">
                                                            <input type="number" min="1" id="regular1" class="form-control" name="first_to_last_number_price[]">
                                                        </div>
                                                        @if ($errors->has('first_to_last_number_price'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('first_to_last_number_price') }}</strong>
                                                            </span>
                                                        @endif

                                                        <div class="col-md-2">
                                                            <button id="priceBtn" class="btn btn-outline-dark">add</button>
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
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Stock Status</label>
                                                                    <select class="form-control" name="stock_status" id="stock_status">
                                                                        <option>Select Stock Status</option>
                                                                        <option value="2">In Stock</option>
                                                                        <option value="1">Stock Out</option>
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
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="regular1" class="control-label">Download link</label>
                                                                    <input type="text" class="form-control" name="download_link">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Demo Link</label><br />
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control" name="demo_link" id="main_qty" placeholder="Enter Your Main Product QTY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Product Image</label>
                                                <input type="file" id="regular1" required multiple  name="product_image[]" accept="image/*">
                                            </div>
                                            @if ($errors->has('prodcut_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('product_image') }}</strong>
                                                </span>
                                            @endif

                                            <div id="size">
                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Product size</label>
                                                    <div class="col-md-12">
                                                        <div class="col-md-10">
                                                            <input type="text" id="regular1" class="form-control" name="product_size[]">

                                                        </div>
                                                        <div class="col-md-2">
                                                            <button id="sizeBtn" class="btn btn-outline-dark">add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Session::get('admin_role') == 2)
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio1" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio2" value="2" >
                                                    <span for="inlineRadio2">Unpublish</span> </label>
                                            </div>
                                            @endif
                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                                    </span>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div><!-- end Text fields example -->

                        </div>
                        <div class="pmd-modal-action">
                            <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save Product</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
<script>
    initSample();
</script>

