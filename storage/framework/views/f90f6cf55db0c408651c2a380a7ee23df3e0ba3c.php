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
                        <?php echo $__env->make('backEnd.includes.dynamicPage.dynamic_page_model', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <span>Dynamic Pages</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Page Name English</strong></th>
                        <th style="text-align: center"><strong>page Name Bangla</strong></th>
                        <th style="text-align: center"><strong>page Name Hindi</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    <?php $__currentLoopData = $dynamicpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dynamicpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td  style="text-align: center" data-title="Total"><?php echo e($dynamicpage->page_name_eng); ?></td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($dynamicpage->page_name_ban); ?></span></td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($dynamicpage->page_name_hin); ?></span></td>
                            <?php if($dynamicpage->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($dynamicpage->status == 2) { ?>
                                <a href="<?php echo e(URL::to('/publish-page/'.$dynamicpage->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="<?php echo e(URL::to('/unpublish-page/'.$dynamicpage->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button  data-target="#form-dialog-country-up<?php echo e($dynamicpage->id); ?>" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
								
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Page')" href="<?php echo e(URL::to('/delete-page/'.$dynamicpage->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php echo $__env->make('backEnd.includes.dynamicPage.dynamic_page_modal_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script>
        function showImage(event){
            var output = document.getElementById('image');
            output.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>