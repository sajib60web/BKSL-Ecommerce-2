<script src="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/ckeditor.js"></script>
<script src="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/samples/js/sample.js"></script>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/assets/ckeditor/')); ?>/samples/toolbarconfigurator/lib/codemirror/neo.css">

<div role="tablist" class="tab-pane" id="bangla_tabs<?php echo e($product->id); ?>">
    <div class="form-group">
        <label for="regular1" class="control-label">পণ্যের নাম</label>
        <input type="text" value="<?php echo e($product->product_name_ban); ?>" class="form-control" name="product_name_ban">
    </div>
    <?php if($errors->has('product_name_ban')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_name_ban')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label for="regular1" class="control-label">পণ্যের দাম</label>
        <input type="number" value="<?php echo e($product->product_price_ban); ?>" class="form-control" name="product_price_ban">
    </div>
    <?php if($errors->has('product_price_ban')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_price_ban')); ?></strong>
        </span>
    <?php endif; ?>
    <div class="form-group">
        <label class="control-label">Note</label>
        <textarea  name="note_ban"  class="form-control"><?php echo e($product->note_ban); ?></textarea>
    </div>
    <?php if($errors->has('prodcut_short_description_ban')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('prodcut_short_description_ban')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label class="control-label">ছোট বিবরণ</label>
        <textarea  name="prodcut_short_description_ban"  class="form-control"><?php echo e($product->prodcut_short_description_ban); ?></textarea>
    </div>
    <?php if($errors->has('prodcut_short_description_ban')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('prodcut_short_description_ban')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label class="control-label">দীর্ঘ বিবরণ</label>
        <textarea id="prodcut_long_description_ban_up<?php echo e($product->id); ?>" name="prodcut_long_description_ban"  class="form-control"><?php echo e($product->prodcut_long_description_ban); ?></textarea>
    </div>
    <?php if($errors->has('prodcut_long_description_ban')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('prodcut_long_description_ban')); ?></strong>
        </span>
    <?php endif; ?>

    <div class="form-group">
        <label for="regular1" class="control-label">পণ্য রঙ</label>
        <input type="text" value="<?php echo e($product->product_color_ban); ?>" class="form-control" name="product_color_ban">
    </div>
    <?php if($errors->has('product_color_ban')): ?>
        <span class="invalid-feedback" role="alert">
            <strong style="color: red"><?php echo e($errors->first('product_color_ban')); ?></strong>
        </span>
    <?php endif; ?>

</div>
<script>
    CKEDITOR.replace( 'prodcut_long_description_ban_up<?php echo e($product->id); ?>' );
</script>

