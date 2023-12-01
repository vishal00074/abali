@extends('layouts.index')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="frontend/img/slider/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h1>OTP</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 offset-md-4">
                    <h3 class="text-center mb-30">OTP </h3>
                    <form method="post" class="Login__form" action="{{ url('verifyotp') }}">
                        @csrf
                        
                        <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                            </div>
                        </div>

                        <!-- form elements -->
                        <input type="hidden" name="user_id" value="{{$id}}">
                        <div class="">
                            <label>Enter OTP</label>
                            <input type="text" class="input-field" name="otp" required>
                            @if ($errors->has('otp'))
								<span class="text-danger">{{ $errors->first('otp') }}</span>
						    @endif
                        </div>
                        
                        <div class="">
                            <div class="col-md-12 mt-4">
                                <div class="text-center">
                                    <button type="submit" class="butn-dark2"><span>Submit</span></button>
                                </div>
                            </div>
                        </div>
                        
                		<p class="text-center text-muted mt-4">Not received your code? 
                		    <a href="{{ url('resend_otp/'.$id) }}" class="text-dark">Resend Code</a>
            		    </p>
						
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection