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
                        <?php echo $__env->make('backEnd.includes.categories.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('backEnd.includes.categories.modal_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success"><b><?php echo e(Session::get('message')); ?></b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b><?php echo e(Session::get('messageD')); ?></b></div>
            <?php } ?>

            <div>
                
                    
                        
                    
                    
                
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Categories Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Image</strong></th>
                        <th style="text-align: center"><strong>Category Name</strong></th>
                        <th style="text-align: center"><strong>Category Description</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td  style="text-align: center" data-title="Total"><img style="width: 200px" name="image" accept="" src="<?php echo e(asset($main_category->image)); ?>"></td>
                        <td  style="text-align: center" data-title="Total"><?php echo e($main_category->category_name); ?></td>
                        <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($main_category->category_description); ?></span></td>
                        <?php if($main_category->status == 1){ ?>
                        <td  style="text-align: center" data-title="date">Published</td>
                        <?php }else{ ?>
                        <td  style="text-align: center" data-title="date">Unpublished</td>
                        <?php } ?>

                        <td style="text-align: center" class="pmd-table-row-action">
                            <?php if ($main_category->status == 2) { ?>
                                <a href="<?php echo e(URL::to('/publish-category-by-id/'.$main_category->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                            <a href="<?php echo e(URL::to('/unpublish-category-by-id/'.$main_category->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">thumb_down</i>
                            </a>
                                <?php } ?>

                                <button onclick="updateCategory(<?php echo e($main_category->id); ?>)" data-target="#form-dialog-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                            <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Category')" href="<?php echo e(URL::to('/delete-category-by-id/'.$main_category->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    

                    </tbody>
                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
   function updateCategory(id){
       $.ajax({
           type: 'get',
           url: '<?php echo URL::to('/edite-categories-by-id'); ?>',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {
              $('#cat_name').val(data.name);
              $('#cat_name_ban').val(data.name_ban);
              $('#cat_name_hin').val(data.name_hin);
              $('#cat_description').val(data.description);
              $('#cat_id').val(id);

              if(data.status == 1){
                  $('#cat_up_radio_one').attr('checked',true);


              }else {
                  $('#cat_up_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>