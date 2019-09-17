<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-update-product<?php echo e($v_order_detailsInfo->id); ?>" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Upadate Product</h2>
                    </div>
                    <div class="modal-body">

                        <?php echo e(Form::open(['url'=> '/update-order-details', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])); ?>

                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->

                                            <!-- Textarea -->
                                            <div class="form-group">
                                                    <div class="form-group">
                                                            <label for="regular1" class="control-label">Product Quantity</label>
                                                            <input type="number" value="<?php echo e($v_order_detailsInfo->product_qty); ?>" required id="product_qty_update" class="form-control" name="product_qty">
                                                            <input type="hidden" value="<?php echo e($v_order_detailsInfo->id); ?>"  class="form-control" name="id">
                                                        </div>
                                                        <?php if($errors->has('product_qty')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color: red"><?php echo e($errors->first('product_qty')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>


                                                <!--Basic Bootstrap tab example end-->
                                                </div>
                                            </div>

                                            <!-- Bootstrap Selectbox -->

                                            
                                                
                                                    
                                                    
                                                        
                                                            

                                                        
                                                        
                                                            
                                                        
                                                    


                                                


                                            

                                        </div>
                                    </div>

                                </div>
                            </div><!-- end Text fields example -->

                        </div>
                        <div class="pmd-modal-action">
                            <button  class="btn pmd-ripple-effect btn-primary" type="submit">Update Product</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>

