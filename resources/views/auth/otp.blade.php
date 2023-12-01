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
                    <h3 class="text-center mb-30">Verify OTP </h3>
                    <form method="post" class="Login__form" action="mail.php">
                        <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                            </div>
                        </div>

                        <!-- form elements -->
                        <!-- <div class="">
                            <label>Verfiy otp </label>
                            <input type="text" class="input-field" name="text" required>
                            <input type="text" class="input-field" name="text" required> -->
                        <div class="otp-field">
                            <input type="text" maxlength="1" />
                            <input type="text" maxlength="1" />
                            <input class="space" type="text" maxlength="1" />
                            <input type="text" maxlength="1" />
                        </div>
          
                        <!-- <div class="otp-input-wrapper">
                            <input type="text" maxlength="4" pattern="[0-9]*" autocomplete="off">
                            <svg viewBox="0 0 240 1" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0" y1="0" x2="240" y2="0" stroke="#3e3e3e" stroke-width="2" stroke-dasharray="44,22" />
                            </svg>
                        </div> -->


                        <!-- <form action="javascript: void(0)" class="otp-form" name="otp-form">
                            <div class="title">
                                <h3>OTP VERIFICATION</h3>
                                <p class="info">An otp has been sent to ********k876@gmail.com</p>
                                <p class="msg">Please enter OTP to verify</p>
                            </div>
                            <div class="otp-input-fields">
                                <input type="number" class="otp__digit otp__field__1">
                                <input type="number" class="otp__digit otp__field__2">
                                <input type="number" class="otp__digit otp__field__3">
                                <input type="number" class="otp__digit otp__field__4">
                                <input type="number" class="otp__digit otp__field__5">
                                <input type="number" class="otp__digit otp__field__6">
                            </div>
          
                            <div class="result"><p id="_otp" class="_notok">855412</p></div>
                        </form> -->

                            <div class="col-md-12">
                                <p>resend link</p>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                <button type="submit" class="butn-dark2"><span>Submit</span></button>
                                </div>
                                <!-- <div class="text-center">
                                    <button type="submit" class="butn-dark2"><span>Resend Linkl</span></button>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection