@extends('layouts.index')
@section('content')
@if(\Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{ \Session::get('success') }}
        </div>
        <button type="button" class="btn-close mb-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{ \Session::forget('success') }}
@if(\Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{ \Session::get('error') }}
        </div>
        <button type="button" class="btn-close mb-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div
      class="banner-header section-padding valign bg-img bg-fixed"
      data-overlay-dark="4"
      data-background="{{ asset('frontend/img/slider/1.jpg') }}"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-12 caption mt-90">
            <h5>Luxury</h5>
            <h1>Properties</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Rooms -->
    <section class="section-padding bg-cream" data-scroll-index="1">
      <div class="container">
        <div class="section-subtitle">Availabilitiy</div>
        <div class="section-title">Search Rooms</div>
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
                    value="{{$check_in}}"
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
                    value="{{$check_out}}"
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
                        <option value="1" data-select2-id="28"{{ $guests == '1' ? ' selected' : '' }}>1</option>
                        <option value="2" data-select2-id="29"{{ $guests == '2' ? ' selected' : '' }}>2</option>
                        <option value="3" data-select2-id="30"{{ $guests == '3' ? ' selected' : '' }}>3</option>
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
    </section>
    <section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            @forelse($availableProperties as $property)
            <div
              class="rooms2 mb-90 animate-box"
              data-animate-effect="fadeInUp"
            >
              <figure>
                <img src="{{  $property->primary_image }}" alt="" class="img-fluid" />
              </figure>
              <div class="caption">
                <h3>{{  $property->price }}£<span>/ Night</span></h3>
                <h4><a href="room-details.html">{{  $property->name }}</a></h4>
                <p>
                  {{  $property->description }}
                </p>
                <div class="row room-facilities">
                <?php  $amenities = explode(',',$property->amenities);  ?>
                @if(is_array($amenities))
                    @for($i = 0; $i < count($amenities); $i++)
                        <div class="col-md-4">
                            <ul>
                                <li><i class="bi bi-cart-check"></i>{{ $amenities[$i] }}</li>
                            </ul>
                        </div>
                    @endfor
                @endif
                </div>
                <hr class="border-2" />
                <div class="info-wrapper">
                  <div class="more">
                    <a href="{{ route('property.detail',[$property->id]) }}" class="link-btn" tabindex="0"
                      >Details <i class="ti-arrow-right"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
            @empty
              <p>This page is empty</p>
          @endforelse
          </div>
        </div>
      </div>
    </section>  
@endsection