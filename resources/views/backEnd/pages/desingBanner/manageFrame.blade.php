@extends('backEnd.pages.dashBoard')
@section('mainContent')

<div id="content" class="pmd-content inner-page">
    <!--tab start-->
    <div class="container-fluid full-width-container value-added-detail-page">
        <section class="row component-section">
            <div class="col-md-9">
                <div class="component-box">
                    <!--Form dialog example -->
                    <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Frame</button>
                </div>
            </div><!-- Form Dialog code and example end -->
        </section>
        <?php if (Session::get('message')) { ?>

            <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
        <?php } ?>
        <?php if (Session::get('messageD')) { ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
        <?php } ?>
        {{Form::open(['url'=> '/search-back-product', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
        <div>
            <div class="pull-right table-title-top-action">
                <div class="pmd-textfield pull-left">
                    <input type="text" id="searchBox" list="browsers" name="searchBack" class="form-control" placeholder="Search for...">
                    <datalist id="browsers"></datalist>
                </div>
                <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
            </div>
            {{Form::close()}}
            <h1 class="section-title" id="services">
                <span>Frame Table</span>
            </h1>
        </div>
        <!-- Table -->
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>
                    <tr>
                        <th style="text-align: center;"><strong>Farme Image</strong></th>
                        <th style="text-align: center;"><strong>Status</strong></th>
                        <th style="text-align: center;"><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody id="product_table">
                    @foreach($farmes as $farme)
                    <tr>
                        <td  style="text-align: center" data-title="Total"><img style="height: 100px; width: 100px"  src="{{asset($farme->farme_image)}}" ></td>
                        <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$farme->status == 1 ? 'Publishe' : 'Unpublished'}}</span></td>
                        <td style="text-align: center; width: auto" class="pmd-table-row-action">
                            @if(Session::get('admin_role') == 1)
                                @if($farme->status == 0)
                                <a href="{{URL::to('/publish-farme/'.$farme->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                @else
                                <a href="{{URL::to('/unpublish-farme/'.$farme->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>

                                @endif
                            @endif
                            <button  data-target="#form-dialog-update-farme" data-id="{{ $farme->id }}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </button>
                            <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Product')" href="{{URL::to('/delete-farme/'.$farme->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--Card Footer -->
    </div>
</div>


<div tabindex="-1" class="modal fade" id="form-dialog-update-farme" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bordered">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h2 class="pmd-card-title-text">Update Frame</h2>
            </div>
            <div class="modal-body">
                {{Form::open(['url'=> '/update-farme', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                <div class="component-box">
                    <!-- Text fields example -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                <div class="pmd-card-body">
                                    <div class="form-group">
                                        <label for="farme_image" class="control-label">Product Image</label>
                                        <input type="file" id="farme_image" name="farme_image" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pmd-modal-action">
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save Product</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

<div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bordered">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h2 class="pmd-card-title-text">Add Frame</h2>
            </div>
            <div class="modal-body">
                {{Form::open(['url'=> '/save-farme', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                <div class="component-box">
                    <!-- Text fields example -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                <div class="pmd-card-body">
                                    <div class="form-group">
                                        <label for="farme_image" class="control-label">Product Image</label>
                                        <input type="file" name="farme_image" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pmd-modal-action">
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save Product</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#form-dialog-update-farme").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            $.ajax({
                url: "{{url('/edit-farme')}}/" + id,
                data: {id: id},
                success: function (data) {
                    // $('#farme_image').val(data.farme_image);
                    console.log(data);
                }
            });
        });
    });
</script>
<script>
    $('#searchBox').on('keyup', function () {
        var name = $(this).val();
        var op = ' ';

        $.ajax({
            type: 'get',
            url: '{!! URL::to(' / search - suggestion') !!}',
            datatype: 'html',
            data: {'name': name},
            success: function (data) {
                // console.log(data);
                for (var i = 0; i < data.length; i++) {
                    op += '<option value="' + data[i].product_name_eng + '">';
                }
                $('#browsers').html(op)
            }

        });
    });
</script>
@endsection


