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
                        <?php echo $__env->make('backEnd.includes.extraIncome.extraIncome_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('backEnd.includes.extraIncome.extraIncome_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
            <?php echo e(Form::open(['url'=> '/search-extra-income', 'method' => 'post', 'class' => 'header_search_form clearfix' ])); ?>

            <div>

                <div class="pull-right table-title-top-action">
                    <div class="pmd-textfield pull-left">
                        <input type="text" name="searchBack" id="exampleInputAmount" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                </div>
                <?php echo e(Form::close()); ?>

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Extra Income List</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Name</strong></th>
                        <th style="text-align: center"><strong>Amount</strong></th>
                        <th style="text-align: center"><strong>Description</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    <?php $__currentLoopData = $extraIncomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraIncome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td  style="text-align: center" data-title="Total"><?php echo e($extraIncome->income_name); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($extraIncome->income_amount); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($extraIncome->income_description); ?></td>
                            <?php if($extraIncome->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>
                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($extraIncome->status == 2) { ?>
                                <a href="<?php echo e(URL::to('/publish-extraIncome/'.$extraIncome->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="<?php echo e(URL::to('/unpublish-extraIncome/'.$extraIncome->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>
                                <button onclick="updateExtraIncome(<?php echo e($extraIncome->id); ?>)" data-target="#form-extraIncome-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Income')" href="<?php echo e(URL::to('/delete-extraIncome/'.$extraIncome->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
        function updateExtraIncome(id){

            $.ajax({
                type: 'get',
                url: '<?php echo URL::to('/edite-extraIncome'); ?>',
                datatype: 'html',
                data:{'id':id},
                success: function (data) {
                    // alert(data)
                    $('#income_name').val(data.income_name);
                    $('#income_id').val(id);
                    $('#income_amount').val(data.income_amount);
                    $('#income_description').val(data.income_description);
                    if(data.status == 1){
                        $('#extra_income_radio_one').attr('checked',true);
                    }else {
                        $('#extra_income_radio_two').attr('checked',true);
                    }
                }

            });
        }



    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>