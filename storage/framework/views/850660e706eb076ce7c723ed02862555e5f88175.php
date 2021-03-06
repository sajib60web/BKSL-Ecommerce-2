<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-up-brand" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Brand</h2>
                    </div>
                    <div class="modal-body">

                        <?php echo e(Form::open(['url'=> 'update-brand', 'method' => 'post', 'class' => 'form-horizontal' ])); ?>

                        <div class="form-group pmd-textfield ">
                            <label for="first-name">Brand Name</label>
                            <input  name="brand_id" type="hidden" class="mat-input form-control" id="brand_id" value="">
                            <input  name="brand_name" type="text" class="mat-input form-control" id="brand_name" value="">
                            <?php if($errors->has('brand_name')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('brand_name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <label for="first-name">Brand Name Bangla</label>
                            <input  name="brand_name_ban" type="text" class="mat-input form-control" id="brand_name_ban" value="">
                            <?php if($errors->has('brand_name_ban')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('brand_name_ban')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <label for="first-name">Brand Name Hindi</label>
                            <input  name="brand_name_hin" type="text" class="mat-input form-control" id="brand_name_hin" value="">
                            <?php if($errors->has('brand_name_hin')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('brand_name_hin')); ?></strong>
                                    </span>
                            <?php endif; ?>


                            <div class="form-group pmd-textfield">
                                <label class="control-label">Brand Description</label>
                                <textarea name="brand_description" id="brand_description" required class="form-control"></textarea>

                            </div>
                            <?php if($errors->has('brand_description')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('brand_description')); ?></strong>
                                    </span>
                            <?php endif; ?>


                            <div class="pmd-card-body">
                                <!-- Inline radio -->
                                <label class="radio-inline pmd-radio">
                                    <input type="radio" name="brand_status" id="brand_up_radio_one" value="1">
                                    <span for="inlineRadio1">Publish</span> </label>
                                <label class="radio-inline pmd-radio">
                                    <input type="radio" name="brand_status" id="brand_up_radio_two" value="2" >
                                    <span for="inlineRadio2">Unpublish</span> </label>

                            </div>
                            <br/>
                            <?php if($errors->has('brand_status')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red"><?php echo e($errors->first('brand_status')); ?></strong>
                                    </span>
                            <?php endif; ?>


                        </div>
                        <div class="pmd-modal-action">
                            <button  class="btn pmd-ripple-effect btn-info" type="submit">Update</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
