<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
    <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse"
            style="margin-left: 20px;">
        <span>Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="hideMenu">
        <br/>
        <div class="well" style="height: 300px;">

            <ul class="nav">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo url('/afflite-category-product', $category->id); ?>"><?php echo $category->category_name; ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>
    </div>
</div>