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
                        <?php echo $__env->make('backEnd.includes.slider.slider_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        
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
                    <span>Slider Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr >
                        <th style="text-align: center"><strong>Slider Image</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody id="product_table">
                    <?php $__currentLoopData = $slider_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td  style="text-align: center" data-title="Total"><img style="height: 100px; width: 100px"  src="<?php echo e(asset($slider_image->small_image)); ?>" ></td>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($slider_image->status == 1 ? 'Publishe' : 'Unpublished'); ?></span></td>
                            <td style="text-align: center; width: auto" class="pmd-table-row-action">
                                <?php if($slider_image->status == 2): ?>
                                <a href="<?php echo e(URL::to('/publish-slider/'.$slider_image->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(URL::to('/unpublish-slider/'.$slider_image->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php endif; ?>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Slider Image')" href="<?php echo e(URL::to('/delete-slider/'.$slider_image->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>