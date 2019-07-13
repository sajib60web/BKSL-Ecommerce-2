@extends('backEnd.pages.dashBoard')
@section('mainContent')

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
                        @include('backEnd.includes.logo.logo_modal')
                        {{--@include('backEnd.includes.product.product_modal_update')--}}
                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>

            <div>
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Logo Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr >
                        <th style="text-align: center"><strong>Logo Image</strong></th>
                        <th style="text-align: center"><strong>status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody id="product_table">
                    @foreach($logos as $logo)
                        <tr>
                            <td  style="text-align: center" data-title="Total"><img style="height: 60px; width: 180px"  src="{{asset($logo->logo_image)}}" ></td>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$logo->status == 1 ? 'publishe' : 'unpublished'}}</span></td>
                            <td style="text-align: center; width: auto" class="pmd-table-row-action">
                                <?php if ($logo->status == 2) { ?>
                                <a href="{{URL::to('/publish-logo/'.$logo->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-logo/'.$logo->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>
                                <button  data-target="#form-dialog-edit" data-toggle="modal" data-mytitle="Hello" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>

                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Logo Image')" href="{{URL::to('/delete-logo/'.$logo->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
               </table>
            </div>
            <!-- Card Footer -->
        </div>
    </div>
    <div tabindex="-1" class="modal fade" id="form-dialog-edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bordered">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h2 class="pmd-card-title-text">Edit Logo</h2>
                </div>
                <div class="modal-body">
                    {{Form::open(['url'=> '/update-logo', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                    <div class="component-box">
                        <!-- Text fields example -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <!-- Bootstrap Selectbox -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Logo Image</label>
                                            <input type="file" required id="regular1"  name="logo_image" accept="image/*">
                                        </div>
                                        @if ($errors->has('logo_image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('logo_image') }}</strong>
                                            </span>
                                        @endif
                                        <div class="form-group">
                                            <label class="radio-inline pmd-radio">
                                                <input type="radio" name="status" id="inlineRadio1" value="1">
                                                <span for="inlineRadio1">Publish</span> </label>
                                            <label class="radio-inline pmd-radio">
                                                <input type="radio" name="status" id="inlineRadio2" value="2" >
                                                <span for="inlineRadio2">Unpublish</span> </label>
                                        </div>
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!-- end Text fields example -->
                    </div>
                    <div class="pmd-modal-action">
                        <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save Slidert</button>
                        <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script>
        window.onload = function() {
            $('#form-dialog-edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var title = button.data('mytitle')
                // var description = button.data('mydescription')
                // var cat_id = button.data('catid')
                console.log(title);

                var modal = $(this)
                // modal.find('.modal-body #title').val(title)
                // modal.find('.modal-body #description').val(description)
                // modal.find('.modal-body #cat_id').val(cat_id)
            });
        }
        
    </script>
@endsection
