<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
    <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse"
            style="margin-left: 20px;">
        <span>Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="hideMenu">
        <br/>
        <div class="well" style="height: 300px;">

            <ul class="nav">
                @foreach($categories as $category)
                    <li>
                        <a href="{!! url('/afflite-category-product', $category->id)!!}">{!! $category->category_name !!}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>