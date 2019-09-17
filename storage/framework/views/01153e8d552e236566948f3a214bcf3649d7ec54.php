<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Sub Category</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Main Categories</h2>
                    </div>
                    <div class="modal-body">

                            <?php echo e(Form::open(['url'=> 'save-sub-category', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])); ?>

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category</label>
                                                <input type="text" id="regular1" class="form-control" name="sub_category_name">
                                            </div>
                                            <?php if($errors->has('sub_category_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('sub_category_name')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category Bangla</label>
                                                <input type="text" id="regular1" class="form-control" name="sub_category_name_ban">
                                            </div>
                                            <?php if($errors->has('sub_category_name_ban')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('sub_category_name_ban')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category Hindi</label>
                                                <input type="text" id="regular1" class="form-control" name="sub_category_name_hin">
                                            </div>
                                            <?php if($errors->has('sub_category_name_hin')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('sub_category_name_hin')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Main Category</label>
                                                <select class="form-control" name="main_category_id">
                                                    <option>-Select Main Category-</option>
                                                    <?php $__currentLoopData = $main_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php if($errors->has('main_category_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('main_category_id')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <input type="file" id="regular1" required  name="image" accept="image/*">
                                            </div>
                                            <?php if($errors->has('image"')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('image"')); ?></strong>
                                    </span>
                                            <?php endif; ?>
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
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                       <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
