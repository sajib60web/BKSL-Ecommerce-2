<script src="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/ckeditor.js"></script>
<script src="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/samples/js/sample.js"></script>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/samples/toolbarconfigurator/lib/codemirror/neo.css">


<div role="tablist" class="tab-pane" id="bootstrap-work">
    <div class="form-group">
        <label for="regular1" class="control-label">Country Name</label>
        <input type="text" id="regular1" class="form-control" name="product_name_hin">
    </div>
    <?php if($errors->has('product_name_hin')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_name_hin')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label for="regular1" class="control-label">Product Price</label>
        <input type="number" id="regular1" class="form-control" name="product_price_hin">
    </div>
    <?php if($errors->has('product_price_hin')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_price_hin')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label class="control-label">Note</label>
        <textarea name="note_hin"  class="form-control"></textarea>
    </div>
    <?php if($errors->has('product_short_description_hin')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_short_description_hin')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label class="control-label">Short Description</label>
        <textarea name="product_short_description_hin"  class="form-control"></textarea>
    </div>
    <?php if($errors->has('product_short_description_hin')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_short_description_hin')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label class="control-label">Long Description</label>
        <textarea id="product_long_description_hin" name="product_long_description_hin" class="form-control"></textarea>
    </div>
    <?php if($errors->has('product_long_description_hin')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_long_description_hin')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label for="regular1" class="control-label">Product Color</label>
        <input type="text" id="regular1" class="form-control" name="product_color_hin">
    </div>
    <?php if($errors->has('product_color_hin')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_color_hin')); ?></strong>
        </span>
    <?php endif; ?>

</div>
<script>
    CKEDITOR.replace( 'product_long_description_hin' );
</script>
