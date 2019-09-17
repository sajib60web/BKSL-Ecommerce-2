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
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center" colspan="2"><h2><strong>Customer Information</strong></h2></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    

                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Name</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($customerInfo->customer_name); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Phone No.</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($customerInfo->customer_phone_number); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Email</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($customerInfo->customer_email); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Address</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($customerInfo->customer_address); ?></td>
                    </tr>

                    


                    

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

                    

                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Name</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($shippingInfo->ship_customer_name); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Phone No.</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($shippingInfo->ship_customer_phone_number); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Email</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($shippingInfo->ship_customer_email); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Address</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($shippingInfo->ship_customer_address); ?></td>
                    </tr>

                    


                    

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

                    

                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Payment Type</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($paymentInfo->payment_type); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Payment Status</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($paymentInfo->payment_status); ?></td>
                    </tr>


                    


                    

                    </tbody>
                </table>
            </div>
            <br/>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center" colspan="2"><h2><strong>Product Information</strong></h2></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">

                    <?php $__currentLoopData = $order_detailsInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_order_detailsInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($image->product_id == $v_order_detailsInfo->product_id): ?>
                        <td colspan="2"  style="text-align: center" data-title="date"><img src="<?php echo e(asset($image->small_image)); ?>"></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Product Name</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($v_order_detailsInfo->product_name); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Product Price</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($v_order_detailsInfo->product_price); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Product Quantity</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($v_order_detailsInfo->product_qty); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Total</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($v_order_detailsInfo->product_qty*$v_order_detailsInfo->product_price); ?></td>
                    </tr>
                    <tr>
                        <td  style="text-align: center" data-title="date"><strong>Shopper Name</strong></td>
                        <td  style="text-align: center" data-title="date"><?php echo e($v_order_detailsInfo->admin_name); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    

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
            
            
                
            

            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>