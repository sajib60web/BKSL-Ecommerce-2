@extends('backEnd.pages.dashBoard')
@section('mainContent')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    body{
        color: #333c4e;
        font-family: 'Roboto', sans-serif;
    }
    #draggable {
        width: 150px;
        height: 150px;
        padding: 0.5em;
    }
    .warper{
        width: 100%;
        height: 600px;
        text-align: center;
    }
    .content{
        position: relative;
        width: 100%;
        height: 600px;
    }
    .mainContent{
        top: 0;
        position: absolute;
    }
    .cursor{
        cursor: pointer;
    }
    .bg {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .ui-widget-content {
        border: none;
        background: none;
        color: #fff !important;
    }
</style>
<div id="content" class="pmd-content content-area dashboard">
    <div class="container-fluid">
        <div class="row" id="card-masonry">
            <!-- Today's Site Activity -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="pmd-card pmd-z-depth">
                    <div class="pmd-card-title">
                        <h2 style="text-align: center; color: #4bdc4b;">Desing Banner Create</h2>
                    </div>
                    <div class="pmd-card-body">
                        <div class="mb-5 p-4 bg-white shadow-sm">
                            <div id="stepper1" class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="bs-stepper-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Selcet Desing</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="bs-stepper-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Profile</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="bs-stepper-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Banner Desing</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <style>
                                        .choiceTop{
                                            position: relative;
                                        }
                                        .choiceFarm {
                                            position: absolute;
                                            left: 45%;
                                            top: 50%;
                                        }
                                    </style>
                                    <form id="form-data" action="{{ route('/save-fb-cover') }}" method="post" class="tab-content" enctype="multipart/form-data">
                                        @csrf
                                        <div id="test-l-1" role="tabpanel" class="tab-pane" aria-labelledby="stepper1trigger1">
                                            <div class="form-group">
                                                <div class="row">
                                                    @foreach($farmes as $farme)
                                                    <div class="col-sm-4 choiceTop">
                                                        <div class="card" style="width: 18rem; border: 1px solid #4bdc4b; text-align: center;">
                                                            <a href="#">
                                                                <img class="card-img-top"  id="image_{{$farme->id}}" src="{{ asset($farme->farme_image) }}" style="width: 100%; height: 200px; padding: 5px;" alt="farme Image">
                                                            </a>
                                                        </div>
                                                        <div class="choiceFarm">
                                                            <input type="checkbox" onchange="imageControl({{$farme->id}})" name="farme_id" value="{{ $farme->id }}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <a class="btn btn-primary" onclick="stepper1.next()">Next</a>
                                        </div>
                                        <div id="test-l-2" role="tabpanel" class="tab-pane" aria-labelledby="stepper1trigger2">
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label>Logo</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="file" class="form-control-file" name="banner_logo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label>Product Name</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="banner_name" placeholder="Product Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label>Product Price</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="banner_price" placeholder="Product Price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label>Product Image</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="file" class="form-control-file" name="banner_image">
                                                </div>
                                            </div>
                                            <a class="btn btn-primary" onclick="stepper1.previous()">Previous</a>
                                            <a class="btn btn-primary" onclick="stepper1.next()">Next</a>
                                            <!-- <button type="submit"  id="submit" class="btn btn-success">Submit</button> -->
                                        </div>
                                        <div id="test-l-3" role="tabpanel" class="tab-pane text-center" aria-labelledby="stepper1trigger3">
                                            <div class="form-group row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="warper">
                                                        <div style="width: 622px; background: url('{{asset('backEnd/stepper')}}/img/grande.jpg')no-repeat;">
                                                            <div class="content bg" id="showImage" style="margin: 0 auto; ">
                                                                <div id="productName" class="ui-widget-content">
                                                                    <h2 class="cursor"  style="color: #4bdc4b; padding-top: 20px;">Samsung galaxy s9</h2>
                                                                </div>
                                                                <div id="productPrice" class="ui-widget-content">
                                                                    <h2 class="cursor"  style="color: #4bdc4b;">500 .Tk</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary mt-5" onclick="stepper1.previous()">Previous</a>
                                            <button type="submit"  id="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    window.onload = function () {
        $(function() {
            $("#productName").draggable();
            $("#productPrice").draggable();
        });

    };
</script>
<script>
    function imageControl(id){
        $image_url = $('#image_'+id).attr('src');
        $('#showImage').css("background-image", "url(" + $image_url + ")");
        // alert($image_url);
    }
</script>


@endsection
