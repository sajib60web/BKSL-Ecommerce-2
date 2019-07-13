<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Main Categories</button>

        <div tabindex="-1" class="modal fade" id="form-dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Main Categories</h2>
                    </div>
                    <div class="modal-body">

                            {{Form::open(['url'=> 'save-main-category', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="first-name">Category Name</label>
                                <input name="category_name" type="text" class="mat-input form-control" id="name" value="">
                                @if ($errors->has('category_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif

                                <label for="first-name">Category Name Bangla</label>
                                <input name="category_name_ban" type="text" class="mat-input form-control" id="name" value="">
                                @if ($errors->has('category_name_ban'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('category_name_ban') }}</strong>
                                    </span>
                                @endif
                                <label for="first-name">Category Name Hindi</label>
                                <input name="category_name_hin" type="text" class="mat-input form-control" id="name" value="">
                                @if ($errors->has('category_name_hin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('category_name_hin') }}</strong>
                                    </span>
                                @endif



                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Categories Description</label>
                                    <textarea name="category_description" required class="form-control"></textarea>

                                </div>
                                @if ($errors->has('category_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('category_description') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group">
                                    <input type="file" id="regular1"  required name="image" accept="image/*">
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif


                                <div class="pmd-card-body">
                                    <!-- Inline radio -->
                                    <label class="radio-inline pmd-radio">
                                        <input type="radio" name="status" id="inlineRadio1" value="1">
                                        <span for="inlineRadio1">Publish</span> </label>
                                    <label class="radio-inline pmd-radio">
                                        <input type="radio" name="status" id="inlineRadio2" value="2" >
                                        <span for="inlineRadio2">Unpublish</span> </label>

                                </div>
                                <br/>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif


                            </div>
                            <div class="pmd-modal-action">
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                       {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
