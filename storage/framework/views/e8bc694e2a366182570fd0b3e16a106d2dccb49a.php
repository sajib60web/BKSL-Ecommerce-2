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
                        <h1 class="section-title" id="services">
                            <span>Order Details</span>
                        </h1><!-- End Title -->
                        <!--Form dialog example -->
                        
                        
                    </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <div>
                <!-- Title -->
               <!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <?php if(Session::get('message')){ ?>

            <div style="text-align: center" class="alert alert-success"><b><?php echo e(Session::get('message')); ?></b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b><?php echo e(Session::get('messageD')); ?></b></div>
            <?php } ?>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center" colspan="2"><h2><strong>Customer Information</strong></h2></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    
                    <?php echo e(Form::open(['url'=> '/customser_update_form_order_details', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>


                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Name</strong></td>
                        <input type="hidden" name="customer_id" value="<?php echo e($customerInfo->id); ?>">
                        <td  style="text-align: center"   data-title="date"><input required name="customer_name" type="text" style="text-align: center" class="form-control" value="<?php echo e($customerInfo->customer_name); ?>"></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Phone No.</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="customer_phone_number" type="number" style="text-align: center" class="form-control" value="<?php echo e($customerInfo->customer_phone_number); ?>"></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Email</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="customer_email" type="email" style="text-align: center" class="form-control" value="<?php echo e($customerInfo->customer_email); ?>"></td>

                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Address</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="customer_address" type="text" style="text-align: center" class="form-control" value="<?php echo e($customerInfo->customer_address); ?>"></td>

                    </tr>
                    <tr>
                        
                        <td  colspan="2" style="text-align: center" data-title="date" contenteditable ><button class="btn btn-info btn-block">Update Customer Info</button></td>
                    </tr>
                    <?php echo e(Form::close()); ?>


                    


                    

                    </tbody>
                </table>
            </div>
            <br/>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center" colspan="2"><h2><strong>Shipping Information</strong></h2></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    
                    <?php echo e(Form::open(['url'=> '/shipping_update_form_order_details', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

                    <input type="hidden" name="ship_customer_id" value="<?php echo e($shippingInfo->id); ?>">

                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Name</strong></td>
                        <td  style="text-align: center" contenteditable  data-title="date"><input required name="ship_customer_name" type="text" style="text-align: center" class="form-control" value="<?php echo e($shippingInfo->ship_customer_name); ?>"></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Phone No.</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="ship_customer_phone_number" type="number" style="text-align: center" class="form-control" value="<?php echo e($shippingInfo->ship_customer_phone_number); ?>"></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Email</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="ship_customer_email" type="email" style="text-align: center" class="form-control" value="<?php echo e($shippingInfo->ship_customer_email); ?>"></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Address</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="ship_customer_address" type="text" style="text-align: center" class="form-control" value="<?php echo e($shippingInfo->ship_customer_address); ?>"></td>
                    </tr>
                    <tr>
                        
                        <td  colspan="2" style="text-align: center" data-title="date" contenteditable ><button class="btn btn-info btn-block">Update Shipping Info</button></td>
                    </tr>
                    <?php echo e(Form::close()); ?>


                    


                    

                    </tbody>
                </table>
            </div>
            <br/>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center" colspan="2"><h2><strong>Payment Information</strong></h2></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    
                    <?php echo e(Form::open(['url'=> '/payment_update_form_order_details', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>


                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Payment Type</strong></td>
                        <input type="hidden" name="payment_id" value="<?php echo e($paymentInfo->id); ?>">
                        <td  style="text-align: center"   data-title="date"><input required name="payment_type" type="text" style="text-align: center" class="form-control" value="<?php echo e($paymentInfo->payment_type); ?>"></td>
                        
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Payment Status</strong></td>
                        <td  style="text-align: center"   data-title="date"><input required name="payment_status" type="text" style="text-align: center" class="form-control" value="<?php echo e($paymentInfo->payment_status); ?>"></td>
                        
                    </tr>
                    <tr>
                        
                        <td  colspan="2" style="text-align: center" data-title="date" contenteditable ><button class="btn btn-info btn-block">Update Payment Info</button></td>
                    </tr>
                    <?php echo e(Form::close()); ?>




                    


                    

                    </tbody>
                </table>
            </div>
            <br/>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">

                    <div class="table-responsive pmd-card pmd-z-depth">
                        <table class="table table-mc-red pmd-table">
                            <thead>
                            <tr>
                                <th style="text-align: center"><strong>Product Image</strong></th>
                                <th style="text-align: center"><strong>Product Name</strong></th>
                                <th style="text-align: center"><strong>Product Qty</strong></th>
                                <th style="text-align: center"><strong>Produt Price</strong></th>
                                <th style="text-align: center"><strong>Total</strong></th>
                                <th style="text-align: center"><strong>Seller Name</strong></th>
                                <th style="text-align: center"><strong>Action</strong></th>
                            </tr>
                            </thead>
                            <tbody id="product_table">
                            <?php $__currentLoopData = $order_detailsInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_order_detailsInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($v_order_detailsInfo->product_id == $image->product_id): ?>

                                            <td  style="text-align: center" data-title="Total"><img style="height: 100px; width: 100px"  src="<?php echo e(asset($image->small_image)); ?>" ></td>
                                            <?php break; ?>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td  style="text-align: center" data-title="Total"><?php echo e($v_order_detailsInfo->product_name); ?></td>
                                    <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($v_order_detailsInfo->product_qty); ?></span></td>
                                    <td id="status"  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($v_order_detailsInfo->product_price); ?></span></td>
                                    <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($v_order_detailsInfo->product_qty*$v_order_detailsInfo->product_price); ?></span></td>
                                    <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($v_order_detailsInfo->admin_name); ?></span></td>

                                    <td style="text-align: center; width: auto" class="pmd-table-row-action">

                                        <button  data-target="#form-dialog-update-product<?php echo e($v_order_detailsInfo->id); ?>" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                        <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Product')" href="<?php echo e(URL::to('/delete-product-form-order/'.$v_order_detailsInfo->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <?php echo $__env->make('backEnd.pages.order-detail.include.order_details_product_modal_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            </tbody>
                        </table>
                    </div>
                    
                    </tbody>
                </table>
            </div>

            <br/>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center" colspan="2"><h2><strong>Total Amount</strong></h2></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    

                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Total</strong></td>
                        <td  style="text-align: center" data-title="date">= <?php echo e($orderInfo->order_total); ?>/=</td>
                    </tr>



                    


                    

                    </tbody>
                </table>
            </div>
            <br/>
            <div class="table-responsive pmd-card pmd-z-depth">
                <a href="<?php echo e(URL::to('/show-invoice/'.$orderInfo->id)); ?>" class="btn btn-info btn-block"><strong style="color: white">Print Invoice</strong></a>
            </div>

            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>