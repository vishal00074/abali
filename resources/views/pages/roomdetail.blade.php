@extends('layouts.index')
@section('content')
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{ asset('frontend/img/slider/1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption mt-90">
                <h5>Details Page</h5>
                <h1>Property Details</h1>
            </div>
        </div>
    </div>
</div>
<section class="room-book my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 big p-1">
                <img src="{{ $property->primary_image }}" alt="property images">
            </div>
            <div class="col-md-6">
                <div class="row right-img-box">
                <?php $count =count($property->secondary_images ?? '')  ?>
                @for($i=0;  $i < $count; $i++)
                    <div class="col-md-6 p-1">
                        <img src="{{ $property->secondary_images[$i] ?? '' }}" alt="property images">
                    </div>
                    @endfor
                </div>
                <button class="btn-show">Show all Photos</button>
            </div>
            
        </div>
    </div>
</section>

<section class="rooms-page ghjg" data-scroll-index="1">
    <div class="container">
        <!-- <img src="{{ $property->primary_image }}" height="50px" width="50px" alt="property images">
        
        @for($i=0;  $i < $count; $i++)
            <img src="{{ $property->secondary_images[$i] ?? '' }}" height="50px" width="50px" alt="property images">
        @endfor -->
        
        <!-- project content -->

        
        <div class="row">
            <div class="col-md-8">
                <span>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i> 
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                </span>
                <div class="section-subtitle">Where do you stay?</div>
                <div class="section-title">{{ $property->name ?? '' }}</div>
                <div class="row">
                    <p class="mb-30">{{ $property->description ?? '' }}</p>
                </div>
                
                <div class="row dfg">
                    <div class="col-md-5">
                        <h6>No of Bedrooms</h6>
                        <ul class="list-unstyled page-list">
                            <li>
                                <div class="page-list-icon"> <span class="fa fa-bed"></span> </div>
                                <div class="page-list-text">
                                    <p>{{ $property->bedroom ?? '' }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <h6>No of  Bathroom</h6>
                        <ul class="list-unstyled page-list">
                            <li>
                                <div class="page-list-icon"> <span class="fa fa-bath"></span> </div>
                                <div class="page-list-text">
                                    <p>{{ $property->bathroom ?? ''}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="fdsc">
                <div class="row">
            <div class="col-md-6 cs">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Total Capacity</h6>
                        <p>{{ $property->capacity ?? '' }}</p>
                    </div>
                    <div class="col-md-12">
                        <h6>Out door Area Sq. ft</h6>
                        <p>{{ $property->outdoor_area ?? '' }}</p>
                    </div>
                    <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="bv">
                        <h6>Net Area</h6>
                        <p>{{ $property->net_area  ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bv">
                        <h6>Gross Area</h6>
                        <p>{{ $property->gross_area ?? '' }}</p>
                        </div>
                    </div>
                    </div>
                    </div>
                    <!--<div class="col-md-12">-->
                    <!--    <div class="butn-dark mt-15 mb-30"> <a href="rooms2.html"><span>Check Now</span></a> </div>-->
                    <!--</div>-->
                </div>    
            </div>
            <div class="col-md-6 ps-4">
            <h6>Amenities</h6>
                <ul class="list-unstyled page-list mb-30">
                    
                    <?php $count_a =count($property->amenities ?? '')  ?>
                    @for($i=0;  $i < $count_a; $i++)
                    <li>
                        <div class="page-list-icon"> <span class="fa fa-check"></span> </div>
                        <div class="page-list-text">
                            <p>{{ $property->amenities[$i] }}</p>
                        </div>
                    </li>
                    @endfor 
                    
                </ul>
            </div>
        </div>
    </div>

        <section class="select-calender">
        <div class="col-md-12">
	    <h3 class="mb-0">Select check-in date</h3>
	    <p>Add your travel dates for exact pricing</p>
	    <div class="calendar-section">
            <div class="container">
                <div class="row">
		
					<div class="calendar-section">
		        <div class="row no-gutters">
		          <div class="col-md-6">

		            <div class="calendar calendar-first" id="calendar_first">
		              <div class="calendar_header">
		                <button class="switch-month switch-left">
		                  <i class="ti-angle-left"></i>
		                </button>
		                <h2></h2>
		                <button class="switch-month switch-right">
		                  <i class="ti-angle-right"></i>
		                </button>
		              </div>
		              <div class="calendar_weekdays"></div>
		              <div class="calendar_content"></div>
		            </div>

		          </div>
		          <div class="col-md-6">

		            <div class="calendar calendar-second" id="calendar_second">
		              <div class="calendar_header">
		                <button class="switch-month switch-left">
		                  <i class="ti-angle-left"></i>
		                </button>
		                <h2></h2>
		                <button class="switch-month switch-right">
		                  <i class="ti-angle-right"></i>
		                </button>
		              </div>
		              <div class="calendar_weekdays"></div>
		              <div class="calendar_content"></div>
		            </div>            

		          </div>

		        </div> <!-- End Row -->
		            
		      </div> <!-- End Calendar -->
	
			</div>
		</div>
</div>
	
</div>
	</section>

            </div>

            <div class="col-md-4">
            <form action="{{url('property-details',$property->id)}}" method="post" class="property_submit is-sticky">
                    @csrf
                    <div classs="row">
                        <div class="col-md-12">
                            <p class="mb-2 prc"><b>Price : &nbsp;&nbsp;£ <span id="iprice">{{ $property->price ?? '' }}</b></span>
                                <input type="hidden" name="price" id="price" value="">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-secondary small">CHECK-IN</span><br>
                                            <input type="date" class="form-control" name="check_in" id="check_in">
                                        </td>
                                        <td>
                                            <span class="text-secondary small">CHECKOUT</span><br>
                                            <input type="date" class="form-control" name="check_out" id="check_out">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-secondary small">GUESTS</span><br>
                                            <select name="guests" id="guests" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12" align="center">
                                <input type="radio" value="0" name="payment_method">&nbsp;CARD PAYMENT&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" value="1" name="payment_method">&nbsp;PAYPAL PAYMENT
                        </div>
                        <div class="col-md-12" align="center">
                            <button type="submit" class="butn-dark2 mt-15 text-center"><span>Submit</span></button>
                        </div>
                        <!--<div class="col-md-12">-->
                        <!--    <p class="text-secondary text-center mb-20">You won't be charged yet</p>-->
                        <!--</div>-->
                    </div>
                </form>
            </div>
        </div>
        


        <div class="row">{!! ($map) !!}</div>
    </div>
</section>
@endsection


@section('script')
<script src="https://preview.colorlib.com/theme/bootstrap/calendar-03/js/main.js"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        if ($(".property_submit").length > 0) {
            $(".property_submit").validate({
                rules: {
                    check_in: "required",
                    check_out: "required",
                    guests: "required"
                },
                messages: {
                    check_in: "Check-in field is required.",
                    check_out: "Checkout field is required.",
                    guests: "Guest field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
        
        $('#check_in').on('change',function(){
            checkdate(this);
        });
        $('#check_out').on('change',function(){
            checkdate(this);
        });
    });
    
    function checkdate(){
        var checkin = $('#check_in').val();
        var checkout = $('#check_out').val();
        
        var amount = {{ $property->price ?? '' }};
        
        if(checkin != "" && checkout != ""){
            var checkinDate = new Date(checkin);
            var checkoutDate = new Date(checkout);
            
            if (checkoutDate > checkinDate) {
                var timeDiff = checkoutDate.getTime() - checkinDate.getTime();
                var totalDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var totalPrice = amount * totalDays;
                console.log(totalDays,totalPrice);
                
                document.getElementById('iprice').innerHTML = totalPrice;
                document.getElementById('price').value = totalPrice;
            }
        }
        else if(checkin == "" && checkout == ""){
            document.getElementById('iprice').innerHTML = '-';
            document.getElementById('price').value = '';
        }
        else{
            document.getElementById('iprice').innerHTML = amount;
            document.getElementById('price').value = amount;
        }
    }
</script>
@endsection