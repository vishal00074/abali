@extends('layouts.index')
@section('content')


@php
 $headers = \DB::table('home_header')->orderBy('id','asc')->get();
 $about = \DB::table('about')->first();
 $contact = \DB::table('contact')->first();
 $features = \DB::table('facilities')->orderBy('id','asc')->get();
@endphp

<header class="header slider-fade">
      <div class="owl-carousel owl-theme">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        @foreach($headers as $header)
        <div
          class="text-center item bg-img"
          data-overlay-dark="5"
          data-background="{{$header->background_image ?? ''}}"
        >
          <div class="v-middle caption">
            <div class="container">
              <div class="row">
                <div class="col-md-10 offset-md-1">
                  <span>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                  </span>
                  <h4>{{$header->title ?? ''}}</h4>
                  <h1>{{$header->sub_title ?? ''}}</h1>
                  <div class="butn-light mt-30 mb-30">
                    <a href="#" data-scroll-nav="1"><span>Properties</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <!-- slider reservation -->
      <div class="reservation">
        <a href="tel:8551004444">
          <div class="icon d-flex justify-content-center align-items-center">
            <i class="flaticon-call"></i>
          </div>
          <div class="call"><span>{{$contact->phone ?? ''}}</span> <br />Reservation</div>
        </a>
      </div>
    </header>
    <!-- Booking Search -->
    <div class="booking-wrapper">
      <div class="container">
        <div class="booking-inner clearfix">
          <form class="form1 clearfix"  action="{{url('find_property')}}" method="post">
              @csrf
            <div class="col1 c1">
              <div class="input1_wrapper">
                <label>Check in</label>
                <div class="input1_inner">
                  <input
                    type="text"
                    class="form-control input datepicker"
                    placeholder="Check in"
                    name="check_in"
                  />
                </div>
              </div>
            </div>
            <div class="col1 c2">
              <div class="input1_wrapper">
                <label>Check out</label>
                <div class="input1_inner">
                  <input
                    type="text"
                    class="form-control input datepicker"
                    placeholder="Check out"
                    name="check_out"
                  />
                </div>
              </div>
            </div>
            <div class="col2 c4" data-select2-id="27">
              <div class="select1_wrapper">
                <label>Guest</label>
                <div class="select1_inner">
                  <select class="select2 select select2-hidden-accessible" style="width: 100%" name="guests" data-select2-id="4" tabindex="-1" aria-hidden="true">
                    <option value="1" data-select2-id="6">Guest</option>
                    <option value="1" data-select2-id="28">1</option>
                    <option value="2" data-select2-id="29">2</option>
                    <option value="3" data-select2-id="30">3</option>
                  </select>
                  <!--<span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-y6j5-container"><span class="select2-selection__rendered" id="select2-y6j5-container" role="textbox" aria-readonly="true" title="Children">Children</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                </div>
              </div>
            </div>
            <!--<div class="col2 c3">-->
            <!--  <div class="select1_wrapper">-->
            <!--    <label>Guest</label>-->
            <!--    <div class="select1_inner">-->
            <!--    <input type="text" name="guest" placeholder="guests"/>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- <div class="col2 c4">
              <div class="select1_wrapper">
                <label>Children</label>
                <div class="select1_inner">
                  <select class="select2 select" style="width: 100%">
                    <option value="1">Children</option>
                    <option value="1">1 Child</option>
                    <option value="2">2 Children</option>
                    <option value="3">3 Children</option>
                    <option value="4">4 Children</option>
                  </select>
                </div>
              </div>
            </div> -->
            <!-- <div class="col2 c5">
              <div class="select1_wrapper">
                <label>Rooms</label>
                <div class="select1_inner">
                  <select class="select2 select" style="width: 100%">
                    <option value="1">1 Room</option>
                    <option value="2">2 Rooms</option>
                    <option value="3">3 Rooms</option>
                    <option value="4">4 Rooms</option>
                  </select>
                </div>
              </div>
            </div> -->
            <div class="col3 c6">
              <button type="submit" class="btn-form1-submit">Check Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
      <div class="container">
        <div class="row">
          <div
            class="col-md-6 mb-30 animate-box"
            data-animate-effect="fadeInUp"
          >
            <span>
              <i class="star-rating"></i>
              <i class="star-rating"></i>
              <i class="star-rating"></i>
              <i class="star-rating"></i>
              <i class="star-rating"></i>
            </span>
            <div class="section-subtitle">The Abali Luxury Hotel</div>
            <div class="section-title">{{$about->title ?? ''}}</div>
            {!!($about->description ?? '')!!}
            <!-- call -->
            <div class="reservations">
              <div class="icon"><span class="flaticon-call"></span></div>
              <div class="text">
                <p>Reservation</p>
                <a href="tel:855-100-4444">{{$contact->phone ?? ''}}</a>
              </div>
            </div>
          </div>
          <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
            <img src="{{$about->image ?? ''}}" alt="" class="mt-90 mb-30" />
          </div>
          <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
            <img src="{{$about->image1 ?? ''}}" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- Rooms -->
    <section class="rooms1 section-padding bg-blck" data-scroll-index="1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-subtitle">
              <span>The Abali Luxury Hotel</span>
            </div>
            <div class="section-title"><span>Properties</span></div>
          </div>
        </div>
        <div class="row">
         @foreach($property_portrait as $portrait )
            <div class="col-md-4">
            <div class="item dfef">
              <div class="position-re o-hidden dfef">
                <img class="dngm" src="{{ $portrait->primary_image ?? '' }}" alt="" />
              </div>
              <div class="con">
                <h6><a href="room-details.html">{{ $portrait->price ?? '' }}£ / Night</a></h6>
                <h5><a href="room-details.html">{{ $portrait->name ?? '' }}</a></h5>
                <div class="line"></div>
                <div class="row facilities">
                  <div class="col col-md-7">
                    <ul>
                      <li><i class="flaticon-bed"></i></li>
                      <li><i class="flaticon-bath"></i></li>
                      <li><i class="flaticon-breakfast"></i></li>
                      <li><i class="flaticon-towel"></i></li>
                    </ul>
                  </div>
                  <div class="col col-md-5 text-end">
                    <div class="permalink">
                      <a href="{{ url('property-details/' . $portrait->id) }}">
                        Details <i class="ti-arrow-right"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          @endforeach
          @foreach($property_landscape as $landscape )
            <div class="col-md-6">
            <div class="item">
              <div class="position-re o-hidden">
                <img src="{{ $landscape->primary_image ?? '' }}" alt="" height="100px" />
              </div>
              <span class="category"><a href="rooms2.html">Book</a></span>
              <div class="con">
                <h6><a href="room-details.html">{{ $landscape->price ?? '' }}£ / Night</a></h6>
                <h5><a href="room-details.html">{{ $landscape->name ?? '' }}</a></h5>
                <div class="line"></div>
                <div class="row facilities">
                  <div class="col col-md-7">
                    <ul>
                      <li><i class="flaticon-bed"></i></li>
                      <li><i class="flaticon-bath"></i></li>
                      <li><i class="flaticon-breakfast"></i></li>
                      <li><i class="flaticon-towel"></i></li>
                    </ul>
                  </div>
                  <div class="col col-md-5 text-end">
                    <div class="permalink">
                      <a href="{{ url('property-details/' . $landscape->id) }}">
                        Details <i class="ti-arrow-right"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Pricing -->
    <!--<section class="pricing section-padding bg-cream">-->
    <!--  <div class="container">-->
    <!--    <div class="row">-->
    <!--      <div class="col-md-4">-->
    <!--        <div class="section-subtitle">Best Prices</div>-->
    <!--        <div class="section-title">Extra Services</div>-->
    <!--        <p class="color-4">-->
    <!--          The best prices for your relaxing vacation. The utanislen quam-->
    <!--          nestibulum ac quame odion elementum sceisue the aucan.-->
    <!--        </p>-->
    <!--        <p class="color-4">-->
    <!--          Orci varius natoque penatibus et magnis disney parturient monte-->
    <!--          nascete ridiculus mus nellen etesque habitant morbine.-->
    <!--        </p>-->
    <!--        <div class="reservations mb-30">-->
    <!--          <div class="icon"><span class="flaticon-call"></span></div>-->
    <!--          <div class="text">-->
    <!--            <p class="color-4">For information</p>-->
    <!--            <a href="tel:855-100-4444">855 100 4444</a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-md-8">-->
    <!--        <div class="owl-carousel owl-theme">-->
    <!--          <div class="pricing-card">-->
    <!--            <img src="{{ asset('frontend/img/pricing/1.jpg') }}" alt="" />-->
    <!--            <div class="desc">-->
    <!--              <div class="name">Room cleaning</div>-->
    <!--              <div class="amount">£50<span>/ month</span></div>-->
    <!--              <ul class="list-unstyled list">-->
    <!--                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>-->
    <!--                <li>-->
    <!--                  <i class="ti-check"></i> Orci miss natoque vasa ince-->
    <!--                </li>-->
    <!--                <li>-->
    <!--                  <i class="ti-close unavailable"></i>Clean sorem ipsum-->
    <!--                  morbin-->
    <!--                </li>-->
    <!--              </ul>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="pricing-card">-->
    <!--            <img src="{{ asset('frontend/img/pricing/2.jpg') }}" alt="" />-->
    <!--            <div class="desc">-->
    <!--              <div class="name">Drinks included</div>-->
    <!--              <div class="amount">£30<span>/ daily</span></div>-->
    <!--              <ul class="list-unstyled list">-->
    <!--                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>-->
    <!--                <li>-->
    <!--                  <i class="ti-check"></i> Orci miss natoque vasa ince-->
    <!--                </li>-->
    <!--                <li>-->
    <!--                  <i class="ti-close unavailable"></i>Clean sorem ipsum-->
    <!--                  morbin-->
    <!--                </li>-->
    <!--              </ul>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="pricing-card">-->
    <!--            <img src="{{ asset('frontend/img/pricing/3.jpg') }}" alt="" />-->
    <!--            <div class="desc">-->
    <!--              <div class="name">Room Breakfast</div>-->
    <!--              <div class="amount">£30<span>/ daily</span></div>-->
    <!--              <ul class="list-unstyled list">-->
    <!--                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>-->
    <!--                <li>-->
    <!--                  <i class="ti-check"></i> Orci miss natoque vasa ince-->
    <!--                </li>-->
    <!--                <li>-->
    <!--                  <i class="ti-close unavailable"></i>Clean sorem ipsum-->
    <!--                  morbin-->
    <!--                </li>-->
    <!--              </ul>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="pricing-card">-->
    <!--            <img src="{{ asset('frontend/img/pricing/4.jpg') }}" alt="" />-->
    <!--            <div class="desc">-->
    <!--              <div class="name">Safe & Secure</div>-->
    <!--              <div class="amount">£15<span>/ daily</span></div>-->
    <!--              <ul class="list-unstyled list">-->
    <!--                <li><i class="ti-check"></i> Hotel ut nisan the duru</li>-->
    <!--                <li>-->
    <!--                  <i class="ti-check"></i> Orci miss natoque vasa ince-->
    <!--                </li>-->
    <!--                <li>-->
    <!--                  <i class="ti-close unavailable"></i>Clean sorem ipsum-->
    <!--                  morbin-->
    <!--                </li>-->
    <!--              </ul>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->
    <!-- Promo Video -->
    <section
      class="video-wrapper video section-padding bg-img bg-fixed"
      data-overlay-dark="3"
      data-background="{{ asset('frontend/img/slider/2.jpg') }}"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <span
              ><i class="star-rating"></i><i class="star-rating"></i
              ><i class="star-rating"></i><i class="star-rating"></i
              ><i class="star-rating"></i
            ></span>
            <div class="section-subtitle">
              <span>The Abali Luxury Hotel</span>
            </div>
            <div class="section-title"><span>Promotional Video</span></div>
          </div>
        </div>
        <div class="row">
          <div class="text-center col-md-12">
            <a class="vid" href="https://youtu.be/7BGNAGahig8">
              <div class="vid-butn">
                <span class="icon">
                  <i class="ti-control-play"></i>
                </span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Facilties -->
    <section class="facilties section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-subtitle">Our Services</div>
            <div class="section-title">Property Features</div>
          </div>
        </div>
        <div class="row">
        @foreach($features as  $feature)
          <div class="col-md-4">
            <div
              class="single-facility animate-box"
            >
              <img src="{{$feature->image ?? ''}}" width="10px" >
              <h5>{{$feature->title ?? ''}}</h5>
              <p>
                {{$feature->description ?? ''}}
              </p>
              <div class="facility-shape">
                <span class="flaticon-world"></span>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </section>
    <!-- Testiominals -->
    <section class="testimonials">
      <div
        class="background bg-img bg-fixed section-padding pb-0"
        data-background="{{ asset('frontend/img/slider/2.jpg') }}"
        data-overlay-dark="3"
      >
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="testimonials-box">
                <div class="head-box">
                  <h6>Testimonials</h6>
                  <h4>What Client's Say?</h4>
                  <div class="line"></div>
                </div>
                <div class="owl-carousel owl-theme">
                  <div class="item">
                    <span class="quote"><img src="{{ asset('frontend/img/quot.png') }}" alt="" /></span>
                    <p>
                      Hotel dapibus asue metus the nec feusiate eraten miss
                      hendreri net ve ante the lemon sanleo nectan feugiat erat
                      hendrerit necuis ve ante otel inilla duiman at finibus
                      viverra neca the sene on satien the miss drana inc fermen
                      norttito sit space, mus nellentesque habitan.
                    </p>
                    <div class="info">
                      <div class="author-img">
                        <img src="{{ asset('frontend/img/team/4.jpg') }}" alt="" />
                      </div>
                      <div class="cont">
                        <span
                          ><i class="star-rating"></i><i class="star-rating"></i
                          ><i class="star-rating"></i><i class="star-rating"></i
                          ><i class="star-rating"></i
                        ></span>
                        <h6>Emily Brown</h6>
                        <span>Guest review</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <span class="quote"><img src="{{ asset('frontend/img/quot.png') }}" alt="" /></span>
                    <p>
                      Hotel dapibus asue metus the nec feusiate eraten miss
                      hendreri net ve ante the lemon sanleo nectan feugiat erat
                      hendrerit necuis ve ante otel inilla duiman at finibus
                      viverra neca the sene on satien the miss drana inc fermen
                      norttito sit space, mus nellentesque habitan.
                    </p>
                    <div class="info">
                      <div class="author-img">
                        <img src="{{ asset('frontend/img/team/1.jpg') }}" alt="" />
                      </div>
                      <div class="cont">
                        <span
                          ><i class="star-rating"></i><i class="star-rating"></i
                          ><i class="star-rating"></i><i class="star-rating"></i
                          ><i class="star-rating"></i
                        ></span>
                        <h6>Nolan White</h6>
                        <span>Guest review</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <span class="quote"><img src="{{ asset('frontend/img/quot.png') }}" alt="" /></span>
                    <p>
                      Hotel dapibus asue metus the nec feusiate eraten miss
                      hendreri net ve ante the lemon sanleo nectan feugiat erat
                      hendrerit necuis ve ante otel inilla duiman at finibus
                      viverra neca the sene on satien the miss drana inc fermen
                      norttito sit space, mus nellentesque habitan.
                    </p>
                    <div class="info">
                      <div class="author-img">
                        <img src="{{ asset('frontend/img/team/5.jpg') }}" alt="" />
                      </div>
                      <div class="cont">
                        <span
                          ><i class="star-rating"></i><i class="star-rating"></i
                          ><i class="star-rating"></i><i class="star-rating"></i
                          ><i class="star-rating"></i
                        ></span>
                        <h6>Olivia Martin</h6>
                        <span>Guest review</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services -->
    <!-- <section class="services section-padding">
      <div class="container">
        <div class="row">
          <div
            class="col-md-6 p-0 animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="img left">
              <a href="restaurant.html"
                ><img src="{{ asset('frontend/img/restaurant/1.jpg') }}" alt=""
              /></a>
            </div>
          </div>
          <div
            class="col-md-6 p-0 bg-cream valign animate-box"
            data-animate-effect="fadeInRight"
          >
            <div class="content">
              <div class="cont text-left">
                <div class="info">
                  <h6>Discover</h6>
                </div>
                <h4>The Restaurant</h4>
                <p>
                  Restaurant inilla duiman at elit finibus viverra nec a lacus
                  themo the nesudea seneoice misuscipit non sagie the fermen
                  ziverra tristiue duru the ivite dianne onen nivami acsestion
                  augue artine.
                </p>
                <div class="butn-dark">
                  <a href="restaurant.html"><span>Learn More</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div
            class="col-md-6 bg-cream p-0 order2 valign animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="content">
              <div class="cont text-left">
                <div class="info">
                  <h6>Experiences</h6>
                </div>
                <h4>Spa Center</h4>
                <p>
                  Spa center inilla duiman at elit finibus viverra nec a lacus
                  themo the nesudea seneoice misuscipit non sagie the fermen
                  ziverra tristiue duru the ivite dianne onen nivami acsestion
                  augue artine.
                </p>
                <div class="butn-dark">
                  <a href="spa-wellness.html"><span>Learn More</span></a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 p-0 order1 animate-box"
            data-animate-effect="fadeInRight"
          >
            <div class="img">
              <a href="spa-wellness.html"><img src="{{ asset('frontend/img/spa/3.jpg') }}" alt="" /></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div
            class="col-md-6 p-0 animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="img left">
              <a href="spa-wellness.html"><img src="{{ asset('frontend/img/spa/2.jpg') }}" alt="" /></a>
            </div>
          </div>
          <div
            class="col-md-6 p-0 bg-cream valign animate-box"
            data-animate-effect="fadeInRight"
          >
            <div class="content">
              <div class="cont text-left">
                <div class="info">
                  <h6>Modern</h6>
                </div>
                <h4>Fitness Center</h4>
                <p>
                  Restaurant inilla duiman at elit finibus viverra nec a lacus
                  themo the nesudea seneoice misuscipit non sagie the fermen
                  ziverra tristiue duru the ivite dianne onen nivami acsestion
                  augue artine.
                </p>
                <div class="butn-dark">
                  <a href="spa-wellness.html"><span>Learn More</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div
            class="col-md-6 bg-cream p-0 order2 valign animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="content">
              <div class="cont text-left">
                <div class="info">
                  <h6>Experiences</h6>
                </div>
                <h4>The Health Club & Pool</h4>
                <p>
                  The health club & pool at elit finibus viverra nec a lacus
                  themo the nesudea seneoice misuscipit non sagie the fermen
                  ziverra tristiue duru the ivite dianne onen nivami acsestion
                  augue artine.
                </p>
                <div class="butn-dark">
                  <a href="spa-wellness.html"><span>Learn More</span></a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 p-0 order1 animate-box"
            data-animate-effect="fadeInRight"
          >
            <div class="img">
              <a href="spa-wellness.html"><img src="{{ asset('frontend/img/spa/1.jpg') }}" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- News --
    <section class="news section-padding bg-blck">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-subtitle"><span>Hotel Blog</span></div>
            <div class="section-title"><span>Our News</span></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <div class="position-re o-hidden">
                  <img src="{{ asset('frontend/img/news/1.jpg') }}" alt="" />
                  <div class="date">
                    <a href="post.html"> <span>Dec</span> <i>02</i> </a>
                  </div>
                </div>
                <div class="con">
                  <span class="category">
                    <a href="news.html">Restaurant</a>
                  </span>
                  <h5><a href="post.html">Historic restaurant renovated</a></h5>
                </div>
              </div>
              <div class="item">
                <div class="position-re o-hidden">
                  <img src="{{ asset('frontend/img/news/2.jpg') }}" alt="" />
                  <div class="date">
                    <a href="post.html"> <span>Dec</span> <i>04</i> </a>
                  </div>
                </div>
                <div class="con">
                  <span class="category">
                    <a href="news.html">Spa</a>
                  </span>
                  <h5><a href="post.html">Benefits of Spa Treatments</a></h5>
                </div>
              </div>
              <div class="item">
                <div class="position-re o-hidden">
                  <img src="{{ asset('frontend/img/news/3.jpg') }}" alt="" />
                  <div class="date">
                    <a href="post.html"> <span>Dec</span> <i>06</i> </a>
                  </div>
                </div>
                <div class="con">
                  <span class="category">
                    <a href="news.html">Bathrooms</a>
                  </span>
                  <h5><a href="post.html">Hotel Bathroom Collections</a></h5>
                </div>
              </div>
              <div class="item">
                <div class="position-re o-hidden">
                  <img src="{{ asset('frontend/img/news/4.jpg') }}" alt="" />
                  <div class="date">
                    <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                  </div>
                </div>
                <div class="con">
                  <span class="category">
                    <a href="news.html">Health</a>
                  </span>
                  <h5>
                    <a href="post.html">Weight Loss with Fitness Health Club</a>
                  </h5>
                </div>
              </div>

              <div class="item">
                <div class="position-re o-hidden">
                  <img src="{{ asset('frontend/img/news/6.jpg') }}" alt="" />
                  <div class="date">
                    <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                  </div>
                </div>
                <div class="con">
                  <span class="category">
                    <a href="news.html">Design</a>
                  </span>
                  <h5>
                    <a href="post.html">Retro Lighting Design in The Hotels</a>
                  </h5>
                </div>
              </div>
              <div class="item">
                <div class="position-re o-hidden">
                  <img src="{{ asset('frontend/img/news/5.jpg') }}" alt="" />
                  <div class="date">
                    <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                  </div>
                </div>
                <div class="con">
                  <span class="category">
                    <a href="news.html">Health</a>
                  </span>
                  <h5>
                    <a href="post.html">Benefits of Swimming for Your Health</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Reservation & Booking Form -->
    <section class="testimonials">
      <div
        class="background bg-img bg-fixed section-padding pb-0"
        data-background="{{ asset('frontend/img/slider/2.jpg') }}"
        data-overlay-dark="2"
      >
        <div class="container">
          <div class="row">
            <!-- Reservation -->
            <div class="col-md-5 mb-30 mt-30">
              <p>
                <i class="star-rating"></i><i class="star-rating"></i
                ><i class="star-rating"></i><i class="star-rating"></i
                ><i class="star-rating"></i>
              </p>
              <h5>
                Each of our guest rooms feature a private bath, wi-fi, cable
                television and include full breakfast.
              </h5>
              <div class="reservations mb-30">
                <div class="icon color-1">
                  <span class="flaticon-call"></span>
                </div>
                <div class="text">
                  <p class="color-1">Reservation</p>
                  <a class="color-1" href="tel:855-100-4444">855 100 4444</a>
                </div>
              </div>
              <p>
                <i class="ti-check"></i><small>Call us, it's toll-free.</small>
              </p>
            </div>
            <!-- Booking From -->
            <!--<div class="col-md-5 offset-md-2">-->
            <!--  <div class="booking-box">-->
            <!--    <div class="head-box">-->
            <!--      <h6>Properties</h6>-->
            <!--      <h4>Hotel Booking Form</h4>-->
            <!--    </div>-->
            <!--    <div class="booking-inner clearfix">-->
            <!--      <form action="rooms2.html" class="form1 clearfix">-->
            <!--        <div class="row">-->
            <!--          <div class="col-md-12">-->
            <!--            <div class="input1_wrapper">-->
            <!--              <label>Check in</label>-->
            <!--              <div class="input1_inner">-->
            <!--                <input-->
            <!--                  type="text"-->
            <!--                  class="form-control input datepicker"-->
            <!--                  placeholder="Check in"-->
            <!--                />-->
            <!--              </div>-->
            <!--            </div>-->
            <!--          </div>-->
            <!--          <div class="col-md-12">-->
            <!--            <div class="input1_wrapper">-->
            <!--              <label>Check out</label>-->
            <!--              <div class="input1_inner">-->
            <!--                <input-->
            <!--                  type="text"-->
            <!--                  class="form-control input datepicker"-->
            <!--                  placeholder="Check out"-->
            <!--                />-->
            <!--              </div>-->
            <!--            </div>-->
            <!--          </div>-->
            <!--          <div class="col-md-6">-->
            <!--            <div class="select1_wrapper">-->
            <!--              <label>Adults</label>-->
            <!--              <div class="select1_inner">-->
            <!--                <select class="select2 select" style="width: 100%">-->
            <!--                  <option value="0">Adults</option>-->
            <!--                  <option value="1">1</option>-->
            <!--                  <option value="2">2</option>-->
            <!--                  <option value="3">3</option>-->
            <!--                  <option value="4">4</option>-->
            <!--                </select>-->
            <!--              </div>-->
            <!--            </div>-->
            <!--          </div>-->
            <!--          <div class="col-md-6">-->
            <!--            <div class="select1_wrapper">-->
            <!--              <label>Children</label>-->
            <!--              <div class="select1_inner">-->
            <!--                <select class="select2 select" style="width: 100%">-->
            <!--                  <option value="0">Children</option>-->
            <!--                  <option value="1">1</option>-->
            <!--                  <option value="2">2</option>-->
            <!--                  <option value="3">3</option>-->
            <!--                  <option value="4">4</option>-->
            <!--                </select>-->
            <!--              </div>-->
            <!--            </div>-->
            <!--          </div>-->
            <!--          <div class="col-md-12">-->
            <!--            <button type="submit" class="btn-form1-submit mt-15">-->
            <!--              Check Availability-->
            <!--            </button>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </form>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </section>
    <!-- Clients -->
    
    @php
    $logos = \DB::table('logo')->orderBy('id','asc')->get();
    @endphp
    <section class="clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
                @foreach($logos as $logo)
              <div class="clients-logo">
                <img src="{{ $logo->image ?? '' }}" alt="" height="100px" width="50px" />
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection    