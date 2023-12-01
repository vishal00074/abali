@extends('layouts.index')
@section('content')
<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="frontend/img/slider/1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-90">
                <h1>Sign up </h1>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->
<section class="contact section-padding">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 offset-md-4">
                <h3 class="text-center mb-30">Sign up</h3>
                <form method="post" class="Login__form" action="{{ url('/registration') }}">
                    @csrf
                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                        </div>
                    </div>
                    <!-- form elements -->
                    <div class="">
                        <label>Name</label>
                        <input type="text" class="input-field" name="name" required>
                        @if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
                    </div>
                    <div class="">
                        <label>Email</label>
                        <input type="email" class="input-field" name="email" required>
                        @if ($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
                    </div>
                    <div class="">
                        <label>Phone</label>
                        <input type="text" class="input-field"  name="phone" required>
                        @if ($errors->has('phone'))
							<span class="text-danger">{{ $errors->first('phone') }}</span>
						@endif
                    </div>
                    <div class="">
                        <label>Password</label>
                        <input type="password" name="password" id="pwd" class="input-field">
                        @if ($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
                    </div>
                    <div class="">
                        <label>Confirm password</label>
                        <input type="password" name="password_c" id="pwd" class="input-field">
                        @if ($errors->has('password_c'))
							<span class="text-danger">{{ $errors->first('password_c') }}</span>
						@endif
                    </div>
                    <div class="mb-30 d-flex">
                        <input type="radio" id="" name="user_type" value="1">
                        @if ($errors->has('user_type'))
							<span class="text-danger">{{ $errors->first('user_type') }}</span>
						@endif
                        <label for="Login as Landholder">Login as Landholder </label><br>
                        <input type="radio" id="" name="user_type" value="0">
                        @if ($errors->has('user_type'))
							<span class="text-danger">{{ $errors->first('user_type') }}</span>
						@endif
                        <label for="Login as user">Login as user </label><br>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="butn-dark2"><span>Register now</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection