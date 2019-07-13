<div class="col-sm-3">
    <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse" style="margin-left: 20px;">
        <span>Category Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="hideMenu">
        <br/>
        <div class="well" style="height: 300px;">

            <ul class="nav">
                @foreach($categories as $category)
                    <li><a href="{!! url('/afflite-category-product', $category->id)!!}">{!! $category->category_name !!}</a> </li>
                @endforeach
            </ul>

        </div>
    </div>

    <div class="navbar-nav" id="hideMenu" style="margin-left: 20px;">
        <h3 style="font-weight: bold">Sub_Category</h3>
        <hr/>
        @foreach($sub_categories as $sub_category)
            <ul class="nav">
                <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;">{!! $sub_category->sub_category_name !!}</a> </li>
            </ul>
        @endforeach
    </div>
    <div class="navbar-nav" id="hideMenu" style="margin-left: 20px;">
        <h3 style="font-weight: bold">Brand</h3>
        <hr/>
        @foreach($brands as $brand)
            <ul class="nav">
                <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;">{!! $brand->brand_name !!}</a> </li>
            </ul>
        @endforeach
    </div>
</div>