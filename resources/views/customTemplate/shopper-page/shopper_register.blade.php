@extends('customTemplate.index')

@section('title', 'Shopper Registration')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_responsive.css">

<style type="text/css" media="screen">
.contact_form_title {
    font-size: 30px;
    font-weight: 500;
    margin-bottom: 37px;
}
.form-control {
    display: block;
    width: 100% !important;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: red;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
</style>
<div class="contact_form">
    <div class="container">
        <div class="row mt-5">
            @if(Session::get('message'))
            <h4 style="margin: 0 auto; margin-bottom: 20px; color: red">{{Session::get('message')}}</h4>
            @endif
        </div>
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_title">Shopper Registration</div>
                    {{Form::open(['url'=> '/save-shopper', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                    <div class="component-box">
                        <!-- Text fields example -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body">
                                        <!-- Regular Input -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Name</label>
                                            <input required type="text" class="form-control" name="user_name">
                                        </div>
                                        @if ($errors->has('user_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('user_name') }}</strong>
                                        </span>
                                        @endif

                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Email</label>
                                            <input required type="email" class="form-control" name="email">
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Phone No.</label>
                                            <input required type="number" class="form-control" min="1" name="phone">
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif

                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Password</label>
                                            <input required type="password" id="password" class="form-control" name="password">
                                        </div>
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Confirm Password</label>
                                            <input required type="password" id="c_password" class="form-control">
                                        </div>
                                        @if ($errors->has('c_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('c_password') }}</strong>
                                        </span>
                                        @endif

                                        @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif

                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <textarea name="address" required class="form-control"></textarea>
                                        </div>
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Country Name</label>
                                            <select required id="country" style="position:" class="form-control" name="country_id">
                                                <option>-Select Country-</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('country_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('country_id') }}</strong>
                                        </span>
                                        @endif
                                        <!-- Bootstrap Selectbox -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Division Name</label>
                                            <select required id="division" class="form-control" name="division_id">
                                                <option>-Select Division-</option>
                                                @foreach($divisions as $division)
                                                <option value="{{$division->id}}">{{$division->division_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('division_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('division_id') }}</strong>
                                        </span>
                                        @endif
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">District Name</label>
                                            <select required id="district" class="form-control" name="district_id">
                                                <option>-Select District-</option>
                                                @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->district_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('district_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('district_id') }}</strong>
                                        </span>
                                        @endif
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Sub District Name</label>
                                            <select required id="sub_district" class="form-control" name="sub_district_id">
                                                <option>-Select Sub District-</option>
                                                @foreach($subdistricts as $subdistrict)
                                                <option value="{{$subdistrict->id}}">{{$subdistrict->sub_district_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('sub_district_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('sub_district_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!-- end Text fields example -->
                    </div>
                    <div class="pmd-modal-action">
                        <button id="btn" class="btn pmd-ripple-effect btn-primary btn-block" type="submit">Register</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

<script src="{{asset('/customTemplate/js/')}}/jquery-3.3.1.min.js"></script>
<script>
    $(document).on('change','#district-user-up', function () {
        var district_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '{!! route("/manage-sub-district") !!}',
            data:{'id':district_id},
            success:function (data) {
                op +='<option  value="">--Select Sub District--</option>';
                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].sub_district_name+'</option>';
                }
                $('#sub_district-user-up').html(op);
            }
        });
    });
</script>

<script>
    $(document).on('change','#division-user-up', function () {
        var division_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '{!! route("/manage-district") !!}',
            data:{'id':division_id},
            success:function (data) {
                op +='<option  value="">--Select District--</option>';
                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                }
                $('#district-user-up').html(op);
            }
        });
    });
</script>

<script>
    $(document).on('change','#country-user-up', function () {
        var division_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '{!! route("/manage-division") !!}',
            data:{'id':division_id},
            success:function (data) {
                op +='<option  value="">--Select District--</option>';
                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                }
                $('#division-user-up').html(op);
            }
        });
    });
</script>

<script>
    var password = document.getElementById("password_up")
        , confirm_password = document.getElementById("c_password_up");
    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
            document.getElementById('btn_up').disabled = true;
        } else {
            confirm_password.setCustomValidity('');
            document.getElementById('btn_up').disabled = false;
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

<script>
    $(document).on('change','#district', function () {
        var district_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '{!! route("/manage-sub-district") !!}',
            data:{'id':district_id},
            success:function (data) {
                op +='<option  value="">--Select Sub District--</option>';
                for (var i=0; i<data.length; i++) {

                    op +='<option  value="'+data[i].id+'">'+data[i].sub_district_name+'</option>';
                }
                $('#sub_district').html(op);
            }
        });
    });
</script>

<script>
    $(document).on('change','#division', function () {
        var division_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '{!! route("/manage-district") !!}',
            data:{'id':division_id},
            success:function (data) {
                op +='<option  value="">--Select District--</option>';
                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].district_name+'</option>';
                }
                $('#district').html(op);
            }
        });
    });
</script>
<script>
    $(document).on('change','#country', function () {
        var division_id = $(this).val();
        var op= " ";
        $.ajax({
            type:'get',
            url: '{!! route("/manage-division") !!}',
            data:{'id':division_id},
            success:function (data) {
                op +='<option  value="">--Select Division--</option>';
                for (var i=0; i<data.length; i++) {
                    op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                }
                $('#division').html(op);
            }
        });
    });
</script>
@endsection