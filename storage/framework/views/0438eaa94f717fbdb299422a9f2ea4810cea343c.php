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
                        <?php echo $__env->make('backEnd.includes.register_user.register_user_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('backEnd.includes.register_user.register_user_modal_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <?php echo e(Form::open(['url'=> '/search-user', 'method' => 'post', 'class' => 'header_search_form clearfix' ])); ?>

                <div class="pull-right table-title-top-action">
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                </div>
                <?php echo e(Form::close()); ?>

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>User Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table table-hover">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>User Name</strong></th>
                        <th style="text-align: center"><strong>Email</strong></th>
                        <th style="text-align: center"><strong>Phone</strong></th>

                        <th style="text-align: center"><strong>District</strong></th>
                        <th style="text-align: center"><strong>Sub District</strong></th>
                        <th style="text-align: center"><strong>status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    <?php $__currentLoopData = $user_admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td onclick="viewRowData(<?php echo e($user_admin->id); ?>)"   style="text-align: center" data-title="Total"><?php echo e($user_admin->user_name); ?>

                                <?php if($user_admin->admin_role == 1){ ?>
                                (Shopper)
                                <?php }else{ ?>
                                (Admin)
                                 <?php } ?>
                            </td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($user_admin->email); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($user_admin->phone); ?></td>

                            <td  style="text-align: center" data-title="Total"><?php echo e($user_admin->district_name); ?></td>
                            <td  style="text-align: center" data-title="Total"><?php echo e($user_admin->sub_district_name); ?></td>
                            <?php if($user_admin->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($user_admin->status == 2) { ?>
                                <a href="<?php echo e(URL::to('/publish-user-by-id/'.$user_admin->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="<?php echo e(URL::to('/unpublish-user-by-id/'.$user_admin->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button onclick="updateuserAdmin(<?php echo e($user_admin->id); ?>)" data-target="#form-dialog-user-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This User')" href="<?php echo e(URL::to('/delete-user-by-id/'.$user_admin->id)); ?>" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
        function viewRowData(id) {
            window.location = '<?php echo e(URL::to('/view-shopper-history/')); ?>/'+id
        }
    </script>

    <script>
        $(document).on('change','#district-user-up', function () {

            var district_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-sub-district'); ?>',
                data:{'id':district_id},
                success:function (data) {
                    op +='<option  value="">--Select Sub District--</option>';
                    for (var i=0; i<data.length; i++) {

                        op +='<option  value="'+data[i].id+'">'+data[i].sub_district_name+'</option>';
                    }
                    $('#sub_district-user-up').html(op);

                }
            });

        });
    </script>



        <script>
        $(document).on('change','#division-user-up', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-district'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    op +='<option  value="">--Select District--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                    }
                    $('#district-user-up').html(op);

                }
            });

        });
    </script>

    <script>
        $(document).on('change','#country-user-up', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-division'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    op +='<option  value="">--Select District--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                    }
                    $('#division-user-up').html(op);

                }
            });

        });
    </script>




    <script>
        var password = document.getElementById("password_up")
            , confirm_password = document.getElementById("c_password_up");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
                document.getElementById('btn_up').disabled = true;
            } else {
                confirm_password.setCustomValidity('');
                document.getElementById('btn_up').disabled = false;
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("c_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
                document.getElementById('btn').disabled = true;
            } else {
                confirm_password.setCustomValidity('');
                document.getElementById('btn').disabled = false;
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

    <script>
        $(document).on('change','#district', function () {

            var district_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-sub-district'); ?>',
                data:{'id':district_id},
                success:function (data) {


                    op +='<option  value="">--Select Sub District--</option>';
                    for (var i=0; i<data.length; i++) {

                        op +='<option  value="'+data[i].id+'">'+data[i].sub_district_name+'</option>';
                    }
                    $('#sub_district').html(op);

                }
            });

        });
    </script>

    <script>
        $(document).on('change','#division', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-district'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    op +='<option  value="">--Select District--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                    }
                    $('#district').html(op);

                }
            });

        });
    </script>
    <script>
        $(document).on('change','#country', function () {
            var division_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '<?php echo route('/manage-division'); ?>',
                data:{'id':division_id},
                success:function (data) {
                    op +='<option  value="">--Select Division--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                    }
                    $('#division').html(op);

                }
            });

        });
    </script>


    <script>
   function updateuserAdmin(id){

       $.ajax({
           type: 'get',
           url: '<?php echo URL::to('/edite-user-by-id'); ?>',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {

               $('#user_name').val(data.user_name);
               $('#email').val(data.email);
               $('#phone').val(data.phone);
               $('#address').val(data.address);
               $('#division-user-up').val(data.division_id);
               $('#district-user-up').val(data.district_id);
               $('#country-user-up').val(data.country_id);
               $('#sub_district-user-up').val(data.sub_district_id);
               $('#commission_rate').val(data.commission_rate);
               $('#shopper_point').val(data.shopper_point);
               $('#shipping_info').val(data.shipping_info);
               $('#shopper_banner_id').attr('src', data.shopper_banner)
               $('#user_id').val(id);


               if(data.admin_role == 1){
                   $('#admin_role_radio_one').attr('checked',true);


               }else {
                   $('#admin_role_radio_two').attr('checked',true);
               }


              if(data.status == 1){
                  $('#user-radio-up-one').attr('checked',true);


              }else {
                  $('#user-radio-up-two').attr('checked',true);
              }
           }

       });
   }



    </script>

    <script>
        function showImage(event){
            var output = document.getElementById('shopper_banner_id');
            output.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.pages.dashBoard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>