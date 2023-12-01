@extends('layouts.index')
@section('content')

    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="http://abali.sbwares.com/frontend/img/slider/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h1>Log in</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 offset-md-4">
                    <h3 class="text-center mb-30">Log In</h3>
                    <form method="post" class="Login__form" action="{{  url('/logged_in') }}">
                        @csrf
                     
                        <div class="row mb-25">
                            <label>Email</label>
                            <input type="email" class="input-field" name="email" required>
                            @if ($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email') }}</span>
						    @endif
                        </div>
                        <div class="row mb-25">
                            <label>Password</label>
                            <input type="password" name="password" id="pwd" class="input-field">
                            @if ($errors->has('password'))
								<span class="text-danger">{{ $errors->first('password') }}</span>
						    @endif
                        </div>
                        <div class="mb-30">
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                            <label class="option">Remember me</a></label>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="butn-dark2"><span>Sign in</span></button>
                            </div>
                        </div>
                        <div class="col text-center text-dark mt-4">Forgot Password ? <a href="{{url('/forget_password')}}">Click Here</a></div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
@endsection    
