<?php $__env->startSection('title', 'Order Succsss'); ?>
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/customTemplate/styles/')); ?>/contact_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_container">
                        <strong>Thanks....</strong>
                        <p>You are successfully complete shopping.. we will contact you soon..</p>
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center" colspan="2">Invoice Number : <?php echo e($order->id); ?></th>
                            </tr>
                            <br/>
                            <tr>
                                <th style="text-align: center" colspan="2">Billing Information</th>
                            </tr><tr>
                                <td style="text-align: center">Name </td>
                                <td style="text-align: center"><?php echo e($billing_info->customer_name); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Phone Number </td>
                                <td style="text-align: center"><?php echo e($billing_info->customer_phone_number); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Email</td>
                                <td style="text-align: center"><?php echo e($billing_info->customer_email); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Address</td>
                                <td style="text-align: center"><?php echo e($billing_info->customer_address); ?></td>

                            </tr>

                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center" colspan="2">Shipping Information</th>
                            </tr><tr>
                                <td style="text-align: center">Name </td>
                                <td style="text-align: center"><?php echo e($shipping_info->ship_customer_name); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Phone Number </td>
                                <td style="text-align: center"><?php echo e($shipping_info->ship_customer_phone_number); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Email</td>
                                <td style="text-align: center"><?php echo e($shipping_info->ship_customer_email); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Country</td>
                                <td style="text-align: center"><?php echo e($country->country_name); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Division</td>
                                <td style="text-align: center"><?php echo e($division->division_name); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Address</td>
                                <td style="text-align: center"><?php echo e($shipping_info->ship_customer_address); ?></td>

                            </tr>

                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center" colspan="2">Payment Information</th>
                            </tr><tr>
                                <td style="text-align: center">Payment Type </td>
                                <td style="text-align: center"><?php echo e($payment->payment_type); ?></td>

                            </tr>
                            <tr>
                                <td style="text-align: center">Payment Status </td>
                                <td style="text-align: center"><?php echo e($payment->payment_status); ?></td>

                            </tr>

                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center" colspan="2">Product Information</th>
                            </tr>
                            <?php ($sum = 0); ?>
                            <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align: center">Name </td>
                                    <td style="text-align: center"><?php echo e($order_detail->product_name); ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">Quantity </td>
                                    <td style="text-align: center"><?php echo e($order_detail->product_qty); ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">Price </td>
                                    <td style="text-align: center"><?php echo e($order_detail->product_price); ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">Total </td>
                                    <td style="text-align: center"><?php echo e($total = $order_detail->product_price*$order_detail->product_qty); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center"><hr/> </td>
                                </tr>
                                <?php ($sum =$sum+$total ); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center" colspan="2">Total Amount</th>
                                <th style="text-align: center"><?php echo e($sum); ?></th>
                            </tr><tr>
                                <th style="text-align: center"> <strong>Total :</strong> (Include shipping charge) </th>
                                <th style="text-align: center"><?php echo e($order->order_total); ?></th>

                            </tr>

                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center"><a style="text-decoration: none; color: white" href="<?php echo e(URL::to('/download-invoice/'.$order->id)); ?>" class="btn btn-success btn-block">Download Invoice</a></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customTemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>