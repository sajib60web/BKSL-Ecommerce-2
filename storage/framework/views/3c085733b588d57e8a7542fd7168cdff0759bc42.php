<script src="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/ckeditor.js"></script>
<script src="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/samples/js/sample.js"></script>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/samples/toolbarconfigurator/lib/codemirror/neo.css">

<div role="tablist" class="tab-pane active" id="eng_tabs<?php echo e($product->id); ?>">
    <div class="form-group">
        <label for="product_name_eng_up" required class="control-label">Product Name</label>
        <input type="text"  value="<?php echo e($product->product_name_eng); ?>" class="form-control" name="product_name_eng">
        <input type="hidden"  value="<?php echo e($product->id); ?>" class="form-control" name="product_id">
    </div>
    <?php if($errors->has('product_name_eng')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_name_eng')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label for="regular1" class="control-label">Product Price</label>
        <input type="number" required value="<?php echo e($product->product_price_eng); ?>" class="form-control" name="product_price_eng">
    </div>
    <?php if($errors->has('product_price_eng')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_price_eng')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label class="control-label">Note</label>
        <textarea  required name="note_eng" class="form-control"><?php echo e($product->note_eng); ?></textarea>
    </div>
    <?php if($errors->has('product_short_description_eng')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_short_description_eng')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label class="control-label">Short Description</label>
        <textarea  required name="product_short_description_eng" class="form-control"><?php echo e($product->product_short_description_eng); ?></textarea>
    </div>
    <?php if($errors->has('product_short_description_eng')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_short_description_eng')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label class="control-label">Long Description</label>
        <textarea id="product_long_description_eng_up<?php echo e($product->id); ?>" required name="prodcut_long_description_eng"  class="form-control"><?php echo e($product->prodcut_long_description_eng); ?></textarea>
    </div>
    <?php if($errors->has('prodcut_long_description_eng')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('prodcut_long_description_eng')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label for="regular1" class="control-label">Product Color</label>
        <input type="text" value="<?php echo e($product->product_color_eng); ?>" required class="form-control" name="product_color_eng">
    </div>



</div>
<script>
    CKEDITOR.replace( 'product_long_description_eng_up<?php echo e($product->id); ?>' );
</script>

