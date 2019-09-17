<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-user-up" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update User</h2>
                    </div>
                    <div class="modal-body">

                        <?php echo e(Form::open(['url'=> 'update-user', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/data' ])); ?>

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Name</label>
                                                <input required type="text" id="user_name" class="form-control" name="user_name">
                                                <input required type="hidden" id="user_id" class="form-control" name="user_id">
                                            </div>
                                            <?php if($errors->has('user_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('user_name')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Email</label>
                                                <input required type="email" id="email" class="form-control" name="email">
                                            </div>
                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Phone No.</label>
                                                <input required type="number" id="phone" class="form-control" name="phone">
                                            </div>
                                            <?php if($errors->has('phone')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Password</label>
                                                <input  type="password" id="password_up" class="form-control" name="password">
                                            </div>
                                            <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Confirm Password</label>
                                                <input  type="password" id="c_password_up" class="form-control">
                                            </div>
                                            <?php if($errors->has('c_password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('c_password')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">User Role</label><br/>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="admin_role" id="admin_role_radio_one" value="1">
                                                    <span for="admin_role_radio_one">Shopper</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="admin_role" id="admin_role_radio_two" value="2" >
                                                    <span for="admin_role_radio_two">Admin</span> </label>
                                            </div>
                                            <?php if($errors->has('admin_role')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('admin_role')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <textarea name="address" id="address" required class="form-control"></textarea>
                                            </div>
                                            <?php if($errors->has('address')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                        <!-- Textarea -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Country Name</label>
                                                <select required id="country-user-up" class="form-control" name="country_id">
                                                    <option>-Select Country-</option>
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php if($errors->has('country_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('country_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Division Name</label>
                                                <select required id="division-user-up" class="form-control" name="division_id">
                                                    <option>-Select Division-</option>
                                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($division->id); ?>"><?php echo e($division->division_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php if($errors->has('division_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('division_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">District Name</label>
                                                <select required id="district-user-up" class="form-control" name="district_id">
                                                    <option>-Select District-</option>
                                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($district->id); ?>"><?php echo e($district->district_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                            <?php if($errors->has('district_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('district_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub District Name</label>
                                                <select required id="sub_district-user-up" class="form-control" name="sub_district_id">
                                                    <option>-Select Sub District-</option>
                                                    <?php $__currentLoopData = $sub_districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($sub_district->id); ?>"><?php echo e($sub_district->sub_district_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                            <?php if($errors->has('sub_district_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('sub_district_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Commission Rate</label>
                                                <input required type="number" id="commission_rate" class="form-control" name="commission_rate">
                                            </div>
                                            <?php if($errors->has('phone')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Shopper Point</label>
                                                <input required type="number" id="shopper_point" class="form-control" name="shopper_point">
                                            </div>
                                            <?php if($errors->has('phone')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Shipping Info</label>
                                                <input required type="text" id="shipping_info" class="form-control" name="shipping_info">
                                            </div>
                                            <?php if($errors->has('phone')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <img style="width: 100%;" id="shopper_banner_id" src="">
                                            <div class="form-group">
                                                <input  type="file" onchange="showImage(event)" class="fileinput-controls" name="shopper_banner">
                                            </div>
                                            <?php if($errors->has('phone')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="user-radio-up-one" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="user-radio-up-two" value="2" >
                                                    <span for="inlineRadio2">Unpublish</span> </label>
                                            </div>
                                            <?php if($errors->has('status')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end Text fields example -->

                        </div>
                        <div class="pmd-modal-action">
                            <button id="btn_up" class="btn pmd-ripple-effect btn-primary" type="submit">Update</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
