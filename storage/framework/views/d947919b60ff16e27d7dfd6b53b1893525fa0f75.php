<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Register</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add User</h2>
                    </div>
                    <div class="modal-body">

                            <?php echo e(Form::open(['url'=> 'save-user', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])); ?>

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Name</label>
                                                <input required type="text"  class="form-control" name="user_name">
                                            </div>
                                            <?php if($errors->has('user_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('user_name')); ?></strong>
                                    </span>
                                        <?php endif; ?>

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Email</label>
                                                <input required type="email"  class="form-control" name="email">
                                            </div>
                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Phone No.</label>
                                                <input required type="number"  class="form-control" name="phone">
                                            </div>
                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                           <div class="form-group">
                                                <label for="regular1" class="control-label">Password</label>
                                                <input required type="password" id="password" class="form-control" name="password">
                                            </div>
                                            <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Confirm Password</label>
                                                <input required type="password" id="c_password" class="form-control">
                                            </div>
                                            <?php if($errors->has('c_password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('c_password')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">User Role</label><br/>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="admin_role" id="admin_role_radio_up_one" value="1">
                                                    <span for="admin_role_radio_up_one">Shopper</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="admin_role" id=admin_role_radio_up_two" value="2" >
                                                    <span for="admin_role_radio_up_two">Admin</span> </label>
                                            </div>
                                            <?php if($errors->has('status')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <textarea name="address" required class="form-control"></textarea>
                                            </div>
                                            <?php if($errors->has('address')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                            <?php endif; ?>

                                            <!-- Textarea -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Country Name</label>
                                                <select required id="country" class="form-control" name="country_id">
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
                                                <select required id="division" class="form-control" name="division_id">
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
                                                <select required id="district" class="form-control" name="district_id">
                                                    <option>-Select District-</option>

                                                </select>
                                            </div>
                                            <?php if($errors->has('district_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('district_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub District Name</label>
                                                <select required id="sub_district" class="form-control" name="sub_district_id">
                                                    <option>-Select Sub District-</option>

                                                </select>
                                            </div>
                                            <?php if($errors->has('sub_district_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('sub_district_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <input type="file"  class="fileinput" name="shopper_banner" accept="image/*">
                                            </div>

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio1" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio2" value="2" >
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
                                <button id="btn" class="btn pmd-ripple-effect btn-primary" type="submit">Register</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                       <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
