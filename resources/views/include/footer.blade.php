@php
$contact = \DB::table('contact')->first();
$social = \DB::table('sociallinks')->first();
@endphp

 <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="footer-column footer-about">
                <h3 class="footer-title">{{$contact->footer_title ?? ''}}</h3>
               {!! ($contact->footer_description ?? '') !!}
              </div>
            </div>
            <div class="col-md-3 offset-md-1">
              <div class="footer-column footer-explore clearfix">
                <h3 class="footer-title">Explore</h3>
                <ul class="footer-explore-list list-unstyled">
                  <li><a href="/">Home</a></li> 
                  <li><a href="/about">About</a></li>
                  <li><a href="/properties">Properties</a></li>
                  <li><a href="/contact">Contact</a></li>
                  <li><a href="{{url('/policy')}}">Privacy Policy</a></li>
			      <li><a href="{{url('/terms')}}"> Terms & Conditions</a></li>
                </ul> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="footer-column footer-contact">
                <h3 class="footer-title">Contact</h3>
                {{$contact->address ?? ''}}
                <div class="footer-contact-info">
                  <p class="footer-contact-phone">
                    <span class="flaticon-call"></span>{{$contact->phone ?? ''}}
                  </p>
                  <p class="footer-contact-mail">{{$contact->email ?? ''}}</p>
                </div>
                <div class="footer-about-social-list">
                  <a href={{$social->instagram ?? ''}}><i class="ti-instagram"></i></a>
                  <a href={{$social->twitter ?? ''}}><i class="ti-twitter"></i></a>
                  <a href={{$social->youtube ?? ''}}><i class="ti-youtube"></i></a>
                  <a href={{$social->facebook ?? ''}}><i class="ti-facebook"></i></a>
                  <a href={{$social->pinterest ?? ''}}><i class="ti-pinterest"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="footer-bottom-inner">
                <p class="footer-bottom-copy-right">
                  © Copyright 2023 Abali Accomodation LTD
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>