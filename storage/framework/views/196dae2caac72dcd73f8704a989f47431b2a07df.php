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
            <?php if(Session::get('message')){ ?>

            <div style="text-align: center" class="alert alert-success"><b><?php echo e(Session::get('message')); ?></b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b><?php echo e(Session::get('messageD')); ?></b></div>
            <?php } ?>

            <div>
                <?php if(isset($searchHide)): ?>


                <?php else: ?>
                    <div class="pull-right table-title-top-action">
                        <?php if(isset($delevery)): ?>
                            <?php echo e(Form::open(['url'=> '/search-shopper-delevery-list', 'method' => 'post', 'class' => 'header_search_form clearfix' ])); ?>

                        <?php else: ?>
                            <?php echo e(Form::open(['url'=> '/search-shopper-order-list', 'method' => 'post', 'class' => 'header_search_form clearfix' ])); ?>

                        <?php endif; ?>
                        <div class="pmd-textfield pull-left">
                            <input type="number" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search by shopper ID...">
                        </div>
                        <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                        <?php echo e(Form::close()); ?>

                    </div>
                <?php endif; ?>


                <!-- Title -->
                <h1 class="section-title" id="services">
                    <?php if(isset($delevery)): ?>
                        <span>Shopper Delevery List</span>
                    <?php else: ?>
                    <span>Shopper Order List</span>
                    <?php endif; ?>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Order ID</strong></th>
                        <th style="text-align: center"><strong>Customer Name</strong></th>
                        <th style="text-align: center"><strong>Shopper ID</strong></th>
                        <th style="text-align: center"><strong>Order Total</strong></th>
                        <th style="text-align: center"><strong>Order Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>


                            <td  style="text-align: center" data-title="Total"><?php echo e($order->order_id); ?></td>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($order->customer_id == $customer->id): ?>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($customer->customer_name); ?></span></td>
                                <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td  style="text-align: center" data-title="date"><?php echo e($order->shopper_id); ?></td>
                            <td  style="text-align: center" data-title="date">$<?php echo e($order->order_total); ?></td>
                            <td  style="text-align: center" data-title="date"><?php echo e($order->order_status); ?></td>

                                  <td style="text-align: center; width: auto "  class="pmd-table-row-action">
                                    <?php if($order->order_status == 'Pending'): ?>
                                        <a href="<?php echo e(URL::to('/success-order/'.$order->order_id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                            <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(URL::to('/pending-order/'.$order->order_id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                            <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(URL::to('/view-order-details_shopper_for_admin/'.$order->order_id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i  class="material-icons md-dark pmd-sm">search</i>
                                    </a>
                                        <?php if(Session::get('admin_role') == 2): ?>
                                    <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Order')" href="<?php echo e(URL::to('/delete-order/'.$order->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i class="material-icons md-dark pmd-sm">delete</i>
                                    </a>
                                        <?php endif; ?>
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
        function upadateOrder(id) {
            $('#updateOrderId').val(id)
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>