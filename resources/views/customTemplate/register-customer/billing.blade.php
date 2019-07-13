@extends('customTemplate.index')

@section('title', 'Billing Information')

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
<link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_responsive.css">

<div class="contact_form">
    <div class="container">
        <div class="row" style="border: 1px solid gainsboro; padding-bottom: 50px">
            <div class="col-lg-12">
                <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Billing Information</div>
                        <p>Hi <strong>{{Session::get('customer_name')}},</strong> Please Fill Your Billing Information</p>

                        {{Form::open(['url'=> '/save-billing-info', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="customer_name"  value="{{$customer->customer_name}}"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                            <input type="hidden" name="customer_id"  value="{{Session::get('customer_id')}}" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="email" name="customer_email" value="{{$customer->customer_email}}"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                        </div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            {{--<input type="text" name="customer_confirm_password"  class="form-control"  >--}}
                            <textarea class="form-control" name="customer_address"  required="required" placeholder="Enter your Full Address"  data-error="Address is required." ></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" name="btn" class="btn-block button contact_submit_button">Confirm & Next</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection

