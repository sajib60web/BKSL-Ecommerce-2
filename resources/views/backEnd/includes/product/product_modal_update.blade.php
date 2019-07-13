<div class="row">
    <div class="col-md-6 col-sm-6">
        <div tabindex="-1" class="modal fade" id="form-dialog-update-product{{$product->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Upadate Product</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> 'update-product', 'method' => 'post', 'class' => 'form-horizontal', 'name'=>'editAdmin', 'enctype' => 'multipart/form-data' ])}}
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
                                                            <select id="product_cat_up{{$product->id}}" required class="form-control" name="main_category_id">
                                                                <option value="">--Select Main Category--</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                document.getElementById("product_cat_up{{$product->id}}").value = {{$product->main_category_id}};
                                                            </script>
                                                        </div>
                                                        @if ($errors->has('main_category_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('main_category_id') }}</strong>
                                                        </span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Sub Category</label>
                                                            <select id="product_sub_cat_up{{$product->id}}" required class="form-control" name="sub_category_id">
                                                                <option value="">-Select Sub Category-</option>
                                                                @foreach($subCategories as $sub_cat)
                                                                <option value="{{$sub_cat->id}}">{{$sub_cat->sub_category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                document.getElementById("product_sub_cat_up{{$product->id}}").value = {{$product->sub_category_id}};
                                                            </script>
                                                        </div>
                                                        @if ($errors->has('sub_category_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('sub_category_id') }}</strong>
                                                        </span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Brand</label>
                                                            <select id="up_product_brand{{$product->id}}" required class="form-control" name="product_brand">
                                                                <option value="">--Select Brand--</option>
                                                                @foreach($brands as $brand)
                                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                document.getElementById("up_product_brand{{$product->id}}").value = {{$product->product_brand}};
                                                            </script>
                                                            @if ($errors->has('product_brand'))
                                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('product_brand') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Offer</label>
                                                            <select id="up_offer{{$product->id}}" required class="form-control" name="offer_id">
                                                                <option value="0">--Select Offer--</option>
                                                                @foreach($offers as $offer)
                                                                    <option value="{{$offer->id}}">{{$offer->page_name_eng}}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                document.getElementById("up_offer{{$product->id}}").value = {{$product->offer_id}};
                                                            </script>
                                                            @if ($errors->has('offer_id'))
                                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('offer_id') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="top_sellers" id="top_sellers_up" {{$product->top_sellers == 1 ? 'checked' : ''}} type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Top Seller
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="special" id="special_up" {{$product->special == 1 ? 'checked' : ''}} type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Special
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="hot_product" id="hot_product_up" {{$product->hot_product == 1 ? 'checked' : ''}} type="checkbox">
                                                                    <i class="input-helper"></i>
                                                                    Hot Product
                                                                </label>
                                                                <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                                    <input value="1"  name="top_rated" id="top_rated_up" {{$product->top_rated == 1 ? 'checked' : ''}} type="checkbox">
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

                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Product Quantity</label>
                                                            <input type="number" required id="product_qty_update" value="{{$product->product_qty}}" class="form-control" name="product_qty">
                                                        </div>
                                                        @if ($errors->has('product_qty'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('product_qty') }}</strong>
                                                            </span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Ex. Date</label>
                                                            <input type="hidden" id="product_id" class="form-control"  name="product_id">
                                                            <input type="date" id="ex_date_update" required value="{{$product->ex_date}}" class="form-control" name="ex_date">
                                                        </div>
                                                        @if ($errors->has('ex_date'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red">{{ $errors->first('ex_date') }}</strong>
                                                            </span>
                                                        @endif

                                                        <div>
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li role="presentation" class="active"><a href="#eng_tabs{{$product->id}}" aria-controls="home" role="tab" data-toggle="tab">English</a></li>
                                                                <li role="presentation"><a href="#bangla_tabs{{$product->id}}" aria-controls="about" role="tab" data-toggle="tab">Bangla</a></li>
                                                                <li role="presentation"><a href="#hindi_tabs{{$product->id}}" aria-controls="work" role="tab" data-toggle="tab">Hindi</a></li>
                                                            </ul>
                                                            <div class="pmd-card">
                                                                <div class="pmd-card-body">
                                                                    <!-- Tab panes -->
                                                                    <div class="tab-content">
                                                                        @include('backEnd.includes.product.include.product_eng_up')
                                                                        @include('backEnd.includes.product.include.product_ban_up')
                                                                        @include('backEnd.includes.product.include.product_hin_up')
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
                                                    <input type="number" min="1" value="{{$product->old_Price}}" id="old_Price" class="form-control" name="old_Price">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Sale Price</label>
                                                <div class="col-md-12">
                                                    <input type="number" min="1" value="{{$product->sale_Price}}" id="sale_Price" class="form-control" name="sale_Price">
                                                </div>
                                            </div>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <label class="control-label">Product Type</label>
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item active">
                                                        <a class="nav-link" aria-controls="general" role="tab" data-toggle="tab" href="#home">General</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" aria-controls="downlable" role="tab" data-toggle="tab" href="#home1">Downloadable</a>
                                                    </li>
                                                </ul>
                                                <div id="home" class="container tab-pane active">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label class="control-label">Stock Status</label>
                                                                    <select class="form-control" name="stock_status" id="stock_status">
                                                                        <option value="0">Select Stock Status</option>
                                                                        <option value="2">In Stock</option>
                                                                        <option value="1">Stock Out</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label class="control-label">Main/Total QTY</label><br />
                                                                        <div class="form-group">
                                                                            <input type="number" class="form-control" name="main_qty" value="{{$product->main_qty}}" id="main_qty" placeholder="Enter Your Main Product QTY">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="home1" class="container tab-pane">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Download link</label>
                                                            <input type="text" class="form-control" id="download_link" name="download_link" placeholder="Enter Download link">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="regular1" class="control-label">Demo link</label>
                                                            <input type="number" class="form-control" name="demo_link" id="demo_link" placeholder="Enter Demo link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="text-uppercase">Size</label>
                                                <input type="text" class="form-control" value="{{$product->size}}" id="size" name="size">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Others</label>
                                                <input type="text" class="form-control" value="{{$product->others}}" id="others" name="others">
                                            </div>

                                            @if(Session::get('admin_role') == 2)
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" {{$product->status == 1 ? 'checked' : ''}} id="product_status_publish" value="1">
                                                    <span for="product_status_publish">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" {{$product->status == 2 ? 'checked' : ''}} id="product_status_unpublish" value="2" >
                                                    <span for="product_status_unpublish">Unpublish</span> </label>
                                            </div>
                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end Text fields example -->
                        </div>
                        <div class="pmd-modal-action">
                            <button  class="btn pmd-ripple-effect btn-primary" type="submit">Update Product</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->
</div>
<script type="text/javascript">
    document.forms['editAdmin'].elements['stock_status'].value = {{$product->stock_status}}
</script>
