<?php $__env->startSection('mainContent'); ?>





    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">

            <section class="row component-section">

                <!-- Form Dialog title and description -->
                <!-- Form Dialog title and description end -->

                <!-- Form Dialog code and example -->
                <div class="col-md-9">
                    <div class="component-box">

                        <!--Form dialog example -->

                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <div id="message" style="text-align: center" class="alert alert-success"></div>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b><?php echo e(Session::get('messageD')); ?></b></div>
            <?php } ?>

            <div>
                <div class="pull-right table-title-top-action">

                </div>
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Product Details</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
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
                </table>
                </table>
                <table class="table table-mc-red pmd-table">

                    <tr>
                        <th colspan="4"><h2><strong>Product Name</strong></h2></th>
                    </tr>
                    <tr>
                        <th style="text-align: center"><?php echo e($product->product_name_eng); ?></th>
                        <th style="text-align: center"><?php echo e($product->product_name_ban); ?></th>
                        <th style="text-align: center"><?php echo e($product->product_name_hin); ?></th>
                        <th style="text-align: center">Other</th>



                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Price</strong></h2></th>
                    </tr>
                    <tr>
                        
                        <th style="text-align: center"><?php echo e($product->product_price_eng); ?></th>
                        <th style="text-align: center"><?php echo e($product->product_price_ban); ?></th>
                        <th style="text-align: center"><?php echo e($product->product_price_hin); ?></th>
                        <th style="text-align: center">Other</th>


                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Qty</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center"><?php echo e($product->product_qty); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Status</strong></h2></th>
                    </tr>
                    <tr>
                        <th style="text-align: center">Top Sellers : <?php echo e($product->top_sellers == 1 ? 'Yes' : 'No'); ?></th>
                        <th style="text-align: center">Feature : <?php echo e($product->special == 1 ? 'Yes' : 'No'); ?></th>
                        <th style="text-align: center">Hot Product : <?php echo e($product->hot_product == 1 ? 'Yes' : 'No'); ?></th>
                        <th style="text-align: center">Top Rated : <?php echo e($product->top_rated == 1 ? 'Yes' : 'No'); ?></th>



                    </tr>

                    <tr>
                        <th colspan="4"><h2><strong>Category, Sub-Category & Brand Name</strong></h2></th>
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
                        <th colspan="4"><h2><strong>Product Short Description (English)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: justify"><?php echo e($product->product_short_description_eng); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Short Description (Bangla)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center"><?php echo e($product->product_short_description_ban); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Short Description (Hindi)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center"><?php echo e($product->product_short_description_hin); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Long Description (English)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: justify"><?php echo e($product->prodcut_long_description_eng); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Long Description (Bangla)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center"><?php echo e($product->prodcut_long_description_ban); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Long Description (Hindi)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center"><?php echo e($product->prodcut_long_description_hin); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Color</strong></h2></th>
                    </tr>
                    <tr>
                        <th style="text-align: center"><?php echo e($product->product_color_eng); ?></th>
                        <th style="text-align: center"><?php echo e($product->product_color_ban); ?></th>
                        <th style="text-align: center"><?php echo e($product->product_color_hin); ?></th>
                        <th style="text-align: center">Other</th>


                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Size</strong></h2></th>
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
                        <th colspan="4"><h2><strong>Seller Name</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center"><?php echo e($adminInfo->user_name); ?></th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Seller Address</strong></h2></th>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: center">
                    <?php echo e($adminInfo->address); ?>, <?php echo e($adminInfo->sub_district_name); ?>, <?php echo e($adminInfo->district_name); ?>, <?php echo e($adminInfo->division_name); ?>, <?php echo e($adminInfo->country_name); ?>.
                        </th>



                    </tr>

                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
       function deleteImage(id) {
           confirm('Are you sure?? you want to delete this image')
           $.ajax({
               type:'get',
               url: '<?php echo route('/delete-image'); ?>',
               datatype: 'html',
               data:{'id':id},

               success:function (data) {
                   $('#'+id).hide();
                   window.location.reload();
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

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>