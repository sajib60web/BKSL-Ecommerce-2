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
                        <?php echo $__env->make('backEnd.includes.sub-district.sub_district_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('backEnd.includes.sub-district.sub_ditrict_modal_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">
                    </div>
                    <a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>
                </div>
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>District Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Sub District</strong></th>
                        <th style="text-align: center"><strong>District</strong></th>
                        <th style="text-align: center"><strong>Division</strong></th>
                        <th style="text-align: center"><strong>Country</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    <?php $__currentLoopData = $sub_districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>


                            <td  style="text-align: center" data-title="Total"><?php echo e($sub_district->sub_district_name); ?></td>
                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($district->id == $sub_district->district_id) { ?>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($district->district_name); ?></span></td>
                                <?php } ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($division->id == $sub_district->division_id) { ?>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($division->division_name); ?></span></td>
                                <?php } ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($country->id == $sub_district->country_id) { ?>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg"><?php echo e($country->country_name); ?></span></td>
                                <?php } ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($sub_district->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($sub_district->status == 2) { ?>
                                <a href="<?php echo e(URL::to('/publish-sub-district-by-id/'.$sub_district->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="<?php echo e(URL::to('/unpublish-sub-district-by-id/'.$sub_district->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button onclick="updateSubDistrict(<?php echo e($sub_district->id); ?>)" data-target="#form-dialog-subDistrict-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Sub District')" href="<?php echo e(URL::to('/delete-sub-district-by-id/'.$sub_district->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
        $(document).on('change','#country_up_sub', function () {
            var division_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-division'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    op +='<option  value="">-Select Division--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                    }
                    $('#division-up-sub').html(op);

                }
            });

        });
    </script>






    <script>
        $(document).on('change','#country_id', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-division'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    op +='<option  value="">-Select Division--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                    }
                    $('#division_id').html(op);

                }
            });

        });
    </script>

    <script>
        $(document).on('change','#division_id', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-district'); ?>',
                data:{'id':division_id},
                success:function (data) {

                    for (var i=0; i<data.length; i++) {

                        op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                    }
                    $('#district').html(op);

                }
            });

        });
    </script>
    <script>
        $(document).on('change','#division-up-sub', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-district'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                    }
                     $('#district-up').html(op);

                }
            });

        });
    </script>

    <script>
   function updateSubDistrict(id){

       $.ajax({
           type: 'get',
           url: '<?php echo URL::to('/edite-sub-district-by-id'); ?>',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {
              $('#sub_district_name').val(data.name);
              $('#sub_district_id').val(id);
              $('#division-up-sub').val(data.division);
              $('#district-up').val(data.district);
              $('#country_up_sub').val(data.country_id);

              if(data.status == 1){
                  $('#sub_district_radio_one').attr('checked',true);


              }else {
                  $('#sub_district_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>