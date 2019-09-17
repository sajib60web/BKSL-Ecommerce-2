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
                    <?php echo $__env->make('backEnd.includes.customer.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <?php echo e(Form::open(['url'=> '/search-customer', 'method' => 'post', 'class' => 'header_search_form clearfix' ])); ?>

                <div class="pull-right table-title-top-action">

                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>

                </div>
               <?php echo e(Form::close()); ?>

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Customer List</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Customer Name</strong></th>
                        <th style="text-align: center"><strong>Customer Phone Number</strong></th>
                        <th style="text-align: center"><strong>Customer Email</strong></th>
                        <th style="text-align: center"><strong>Customer Address</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody id="category_table">
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td  style="text-align: center" data-title="Total"><?php echo e($customer->customer_name); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($customer->customer_phone_number); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($customer->customer_email); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($customer->customer_address); ?></td>
                            <td style="text-align: center" class="pmd-table-row-action">
                                <button onclick="updateCustomer(<?php echo e($customer->id); ?>)" data-target="#form-dialog-customer-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This User')" href="<?php echo e(URL::to('/delete-customer-by-id/'.$customer->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
        function updateCustomer(id){
            $.ajax({
                type: 'get',
                url: '<?php echo URL::to("/edite-customer-by-id"); ?>',
                datatype: 'html',
                data:{'id':id},
                success: function (data) {
                    $('#customer_name').val(data.customer_name);
                    $('#customer_id').val(data.id);
                    $('#customer_phone_number').val(data.customer_phone_number);
                    $('#customer_email').val(data.customer_email);
                    $('#customer_address').val(data.customer_address);
                    if(data.member_cart_id != null){
                        $('#customer_member_id').val(data.member_cart_id)
                    }else {
                        $('#customer_member_id').val(0)
                    }
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>