@php
    $contact = \DB::table('contact')->select('*')->first();
@endphp

@extends('layouts.index')
@section('content')
 <div
      class="banner-header section-padding valign bg-img bg-fixed"
      data-overlay-dark="3"
      data-background="{{ asset('frontend/img/slider/1.jpg') }}"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-left caption mt-90">
            <h5>Get in touch</h5>
            <h1>Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact -->
    <section class="contact section-padding">
      <div class="container">
        <div class="row mb-90">
          <div class="col-md-6 mb-60">
            <h3>{{$contact->title ?? ''}}</h3>
            {!!($contact->description ?? '')!!}
            <div class="reservations mb-30">
              <div class="icon"><span class="flaticon-call"></span></div>
              <div class="text">
                <p>Reservation</p>
                <a href="tel:855-100-4444">{{$contact->phone ?? ''}}</a>
              </div>
            </div>
            <div class="reservations mb-30">
              <div class="icon"><span class="flaticon-envelope"></span></div>
              <div class="text">
                <p>Email Info</p>
                <a href="mailto:info@luxuryhotel.com">{{$contact->email ?? ''}}</a>
              </div>
            </div>
            <div class="reservations">
              <div class="icon">
                <span class="flaticon-location-pin"></span>
              </div>
              <div class="text">
                <p>Address</p>
                {!!($contact->address ?? '')!!}
              </div>
            </div>
          </div>
          <div class="col-md-5 mb-30 offset-md-1">
            <h3>Get in touch</h3>
            <form id="contact_form" action="{{ url('/user_queries') }}" method="POST" id="dreamit-form">
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="name"  placeholder="Name">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="email" name="email" placeholder="Email Address">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="phone" placeholder="Phone Number">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="subject" placeholder="Subject">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form_box mb-30">
										<textarea name="message" id="message" cols="30" rows="6" placeholder="Write a Message"></textarea>
									</div>
									<div class="quote_btn">
										<button class="btn" type="submit">Send Message</button>
									</div>
								</div>
							</div>
						</form>
          </div>
        </div>
        <!-- Map Section -->
        <div class="row">
          <div class="col-md-12 map animate-box" data-animate-effect="fadeInUp">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str"
              width="100%"
              height="600"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
            ></iframe>
          </div> 
        </div>
      </div>
    </section>
    
    
    <section class="clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
              <div class="clients-logo">
                <a href="#0"><img src="{{ asset('frontend/img/clients/1.png') }}" alt="" /></a>
              </div>
              <div class="clients-logo">
                <a href="#0"><img src="{{ asset('frontend/img/clients/2.png') }}" alt="" /></a>
              </div>
              <div class="clients-logo">
                <a href="#0"><img src="{{ asset('frontend/img/clients/3.png') }}" alt="" /></a>
              </div>
              <div class="clients-logo">
                <a href="#0"><img src="{{ asset('frontend/img/clients/4.png') }}" alt="" /></a>
              </div>
              <div class="clients-logo">
                <a href="#0"><img src="{{ asset('frontend/img/clients/5.png') }}" alt="" /></a>
              </div>
              <div class="clients-logo">
                <a href="#0"><img src="{{ asset('frontend/img/clients/6.png') }}" alt="" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection   