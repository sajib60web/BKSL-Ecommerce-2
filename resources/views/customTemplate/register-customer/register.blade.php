@extends('customTemplate.index')

@section('title', 'Register Customer')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_responsive.css">

<div class="contact_form"> 
    <div class="container">
        <div class="row">
            @if(Session::get('message'))
            <h4 style="margin: 0 auto; margin-bottom: 20px; color: red">{{Session::get('message')}}</h4>
            @endif
        </div>
        <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
            <div class="col-lg-6" style="border-left: 1px solid gainsboro">
                <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Register</div>
                        {{Form::open(['url'=> '/register-newcustomer', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="customer_name"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="customer_phone_number"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="email" name="customer_email" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="password" name="customer_password"  class="form-control" placeholder="Enter your password" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="password" name="customer_confirm_password" class="form-control" placeholder="Enter your confirm password" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" name="btn" class="btn-block button contact_submit_button">Register</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="border-left: 1px solid gainsboro">
                <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Login</div>
                        {{Form::open(['url'=> '/customer-login', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="customer_email"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="password" name="customer_password" class="form-control" placeholder="Enter your password" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class=" btn-block button contact_submit_button">Login</button>
                        </div>
                        {{Form::close()}}
                         <div class="contact_form_button">
                             <a href="{{URL::to('/login/facebook')}}"><button style="background-color: #4267b2" class=" btn-block button contact_submit_button "></span>Continue with Facebook</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection

