<div class="col-sm-3">
    <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse" style="margin-left: 20px;">
        <span>Category Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="hideMenu">
        <br/>
        <div class="well" style="height: 300px;">

            <ul class="nav">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo url('/afflite-category-product', $category->id); ?>"><?php echo $category->category_name; ?></a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>
    </div>

    <div class="navbar-nav" id="hideMenu" style="margin-left: 20px;">
        <h3 style="font-weight: bold">Sub_Category</h3>
        <hr/>
        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul class="nav">
                <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;"><?php echo $sub_category->sub_category_name; ?></a> </li>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="navbar-nav" id="hideMenu" style="margin-left: 20px;">
        <h3 style="font-weight: bold">Brand</h3>
        <hr/>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul class="nav">
                <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;"><?php echo $brand->brand_name; ?></a> </li>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>