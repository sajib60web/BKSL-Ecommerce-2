<!DOCTYPE html>
<!--[if IE 8]> <html lang="en,bn,hi" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en,bn,hi" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en,bn,hi"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta charset="utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo e(asset('assets/assets/')); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/assets/')); ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/assets/')); ?>/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    
    <link href="<?php echo e(asset('assets/css/')); ?>/style.css" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/')); ?>/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/')); ?>/style-default.css" rel="stylesheet" id="style_color" />

</head>
<style>
    @media  print {
        .nurr{
            float: right!important;
        }


    }
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->

<!-- END HEADER -->
<!-- BEGIN CONTAINER -->

<!-- BEGIN SIDEBAR -->

<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->

<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->

    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <br/>
    <br/>
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN BLANK PAGE PORTLET-->
            <div class="widget purple">

                <div class="widget-body">
                    <div>

                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="text-center">
                                <img alt="" src="<?php echo e(asset('assets/img/')); ?>/vector-lab.jpg">
                            </div>
                            <hr>

                        </div>
                    </div>

                    <div class="space20"></div>
                    <div class="space20"></div>
                    <div class="space20"></div>


                </div>
            </div>
            <!-- END BLANK PAGE PORTLET-->
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="span3">
                    <div class="">
                        <div class="">


                            <h4>BILL TO :</h4>
                            <ul class="unstyled">
                                <li><?php echo e($customerInfo->customer_name); ?></li>
                                <li><?php echo e($customerInfo->customer_phone_number); ?></li>
                                <li><?php echo e($customerInfo->customer_email); ?></li>
                                <li style="text-align: justify"><?php echo e($customerInfo->customer_address); ?></li>
                            </ul>

                        </div>


                    </div>


                </div>
            </div>


            <div class="col-md-3">
                <div class="span3">
                    <div class="">
                        <div class="">


                            <h4>SHIPP TO :</h4>
                            <ul class="unstyled">
                                <li><?php echo e($shippingInfo->ship_customer_name); ?></li>
                                <li><?php echo e($shippingInfo->ship_customer_phone_number); ?></li>
                                <li><?php echo e($shippingInfo->ship_customer_email); ?></li>
                                <li><?php echo e($shippingInfo->ship_customer_address); ?></li>
                            </ul>

                        </div>


                    </div>



                </div>
            </div>
            <div class="col-md-3" style="text-align: center">
                <div class="span3">
                    <div class="">
                        <div class="">


                            <h4>INVOICE NO :</h4>
                            <h4>ORDER DATE :</h4>
                            <h4>INVOICE DATE :</h4>
                            <h4>CODE :</h4>


                        </div>


                    </div>


                </div>
            </div>
            <div class="col-md-3" style="float: right">
                <div class="span3">
                    <div class="">
                        <div class="">
                            <h4># <?php echo e($orderInfo->id); ?></h4>
                            <h4><?php echo date('d-m-y',  strtotime($orderInfo->created_at)); ?></h4>
                            <h4><?php echo date('d-m-y'); ?></h4>
                            

                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row-fluid">
        <div class="row-fluid">
            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>Qty</th>
                    <th class="hidden-480">Product Name</th>
                    <th class="hidden-480">Unit Price</th>
                    <th class="hidden-480">Amount</th>

                </tr>
                </thead>
                <tbody>
                <?php $totalAmount = 0; ?>
                <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($orderDetail->product_qty); ?></td>
                    <td class="hidden-480"><?php echo e($orderDetail->product_name); ?></td>
                    <td class="hidden-480">Tk. <?php echo e($orderDetail->product_price); ?> /=</td>
                    <td class="hidden-480">Tk. <?php echo e($sum = $orderDetail->product_qty*$orderDetail->product_price); ?> /=</td>

                </tr>
                    <?php $totalAmount = $totalAmount+$sum ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
        <div class="space20"></div>
        <div class="row-fluid">
            <div class="span4 invoice-block pull-right">
                <ul class="unstyled amounts">
                    <li><strong> - Total Amount :  Tk. <?php echo e($totalAmount+$shippingInfo->ship_charge); ?> /=</strong></li>

                </ul>
            </div>
        </div>
        <div class="space20"></div>
        <div class="row-fluid text-center">

            
        </div>
    </div>
</div>
<!-- END BLANK PAGE PORTLET-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->

<!-- END PAGE -->

<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="<?php echo e(asset('assets/js/')); ?>/jquery-1.8.3.min.js"></script>
<script src="<?php echo e(asset('assets/js/')); ?>/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/assets/')); ?>/bootstrap/js/bootstrap.min.js"></script>

<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="<?php echo e(asset('assets/js/')); ?>/excanvas.js"></script>
<script src="<?php echo e(asset('assets/js/')); ?>/respond.js"></script>
<![endif]-->

<!--common script for all pages-->
<script src="<?php echo e(asset('assets/js/')); ?>/common-scripts.js"></script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
