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
                        <?php echo $__env->make('backEnd.includes.country.country_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('backEnd.includes.country.country_modal_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

                <div class="pull-right table-title-top-action">
                    <?php echo e(Form::open(['url'=> '/search-country', 'method' => 'post', 'class' => 'header_search_form clearfix' ])); ?>

                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    <?php echo e(Form::close()); ?>

                </div>

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Country Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Division Name</strong></th>
                        <th style="text-align: center"><strong>Division Description</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>


                            <td  style="text-align: center" data-title="Total"><?php echo e($country->country_name); ?></td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($country->country_description); ?></span></td>
                            <?php if($country->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($country->status == 2) { ?>
                                <a href="<?php echo e(URL::to('/publish-country-by-id/'.$country->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="<?php echo e(URL::to('/unpublish-country-by-id/'.$country->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button onclick="updateCountry(<?php echo e($country->id); ?>)" data-target="#form-dialog-country-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Country')" href="<?php echo e(URL::to('/delete-country-by-id/'.$country->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
   function updateCountry(id){

       $.ajax({
           type: 'get',
           url: '<?php echo URL::to('/edite-country-by-id'); ?>',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {


              $('#country_name').val(data.country_name);
              $('#shipping_charge').val(data.shipping_charge);
              $('#country_id').val(id);
              $('#country_description').val(data.country_description);

              if(data.status == 1){
                  $('#country_radio_one').attr('checked',true);


              }else {
                  $('#country_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>