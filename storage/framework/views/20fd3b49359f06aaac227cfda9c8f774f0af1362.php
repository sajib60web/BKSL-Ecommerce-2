<?php $__env->startSection('title', 'Shopper Product Image Update'); ?>

<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate')); ?>/styles/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/cart_responsive.css">
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
            
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>
            <?php if(Session::has('messageD')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(Session::get('messageD')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="table-responsive pmd-card pmd-z-depth">
                    <table class="table table-mc-red pmd-table">
                        <tbody>
                            <tr>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th id="<?php echo e($product_image->id); ?>">
                                    <img style="height: 100px; width: 100px"  src="<?php echo e(asset($product_image->medium_image)); ?>"><br>
                                    <button  id="btnImage" onclick="deleteImage(<?php echo e($product_image->id); ?>)" class="btn btn-danger">Remove</button>
                                </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <tr>
                                <?php
                                if (isset($key)){

                                }else{
                                $key= 1;
                                }
                                ?>
                                <?php echo e(Form::open(['url'=> 'update-image', 'id' => 'uploadImage', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])); ?>

                                <th colspan="<?php echo e($key+1); ?>">
                                    <input type="hidden" name="productId"  value="<?php echo e($product->id); ?>">
                                    <input type="file" id="productImagefield" multiple  name="product_image[]" accept="image/*">
                                    <input id="imageBtn" disabled style="float: right" type="submit" class="btn btn-success right" value="Add Image">
                                </th>
                                <?php echo e(Form::close()); ?>

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
                                <th style="text-align: center"><?php echo e($product->product_name_eng); ?></th>
                                <th style="text-align: center"><?php echo e($product->product_name_ban); ?></th>
                                <th style="text-align: center"><?php echo e($product->product_name_hin); ?></th>
                                <th style="text-align: center">Other</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Price</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center"><?php echo e($product->product_price_eng); ?></th>
                                <th style="text-align: center"><?php echo e($product->product_price_ban); ?></th>
                                <th style="text-align: center"><?php echo e($product->product_price_hin); ?></th>
                                <th style="text-align: center">Other</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Qty</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: center"><?php echo e($product->product_qty); ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Status</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center">Top Sellers : <?php echo e($product->top_sellers == 1 ? 'Yes' : 'No'); ?></th>
                                <th style="text-align: center">Feature : <?php echo e($product->special == 1 ? 'Yes' : 'No'); ?></th>
                                <th style="text-align: center">Hot Product : <?php echo e($product->hot_product == 1 ? 'Yes' : 'No'); ?></th>
                                <th style="text-align: center">Top Rated : <?php echo e($product->top_rated == 1 ? 'Yes' : 'No'); ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Main Category, Sub Category &amp; Brand Name3</h3>
                                </th>
                            </tr>
                            <tr>
                                <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->main_category_id == $main_category->id): ?>
                                <th style="text-align: center"><?php echo e($main_category->category_name); ?></th>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->sub_category_id == $sub_category->id): ?>
                                <th style="text-align: center"><?php echo e($sub_category->sub_category_name); ?></th>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->product_brand == $brand->id): ?>
                                <th style="text-align: center"><?php echo e($brand->brand_name); ?></th>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <th style="text-align: center">Publication Status: <?php echo e($product->status == 1 ? 'Published' : 'Unpublished'); ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Short Description (English)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify"><?php echo $product->product_short_description_eng; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Short Description (Bangla)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify"><?php echo $product->prodcut_short_description_ban; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Short Description (Hindi)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: center"><?php echo $product->product_short_description_hin; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Long Description (English)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify"><?php echo $product->prodcut_long_description_eng; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Long Description (Bangla)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify"><?php echo $product->prodcut_long_description_ban; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Long Description (Hindi)</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: justify"><?php echo $product->product_long_description_hin; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Color</h3>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center"><?php echo e($product->product_color_eng); ?></th>
                                <th style="text-align: center"><?php echo e($product->product_color_ban); ?></th>
                                <th style="text-align: center"><?php echo e($product->product_color_hin); ?></th>
                                <th style="text-align: center">Other</th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Product Size</h3>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align: center">
                                    <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($size->product_id == $product->id): ?>
                                    <?php echo e($size->product_size_name); ?>,
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Seller Name</h3>
                                </th>
                            </tr>
                            <tr>
                                <th  colspan="4" style="text-align: center"><?php echo e($adminInfo->user_name); ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h3>Seller Address</h3>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align: center">
                                    <?php echo e($adminInfo->address); ?>, <?php echo e($adminInfo->sub_district_name); ?>, <?php echo e($adminInfo->district_name); ?>, <?php echo e($adminInfo->division_name); ?>, <?php echo e($adminInfo->country_name); ?>.
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
<script src="<?php echo e(asset('/customTemplate/js/')); ?>/jquery-3.3.1.min.js"></script>

<script>
   function deleteImage(id) {
       confirm('Are you sure?? you want to delete this image')
       $.ajax({
           type:'get',
           url: "<?php echo route('/shopper-delete-image'); ?>",
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>