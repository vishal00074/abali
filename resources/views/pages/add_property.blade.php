
@extends('layouts.index')
@section('content')
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
    data-background="{{ asset('frontend/img/slider/1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption mt-90">
                <h5>Luxury Hotel</h5>
                <h1>Add Listing</h1>
            </div>
        </div>
    </div>
</div>
<!-- Content
   ================================================== -->
<!-- Container -->
<section class="section-padding listingab">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="add-listing" class="separated-form">
                    <!-- Section -->
                    <div class="add-listing-section">
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="ti-write"></i> Basic Informations</h3>
                        </div>
                        
                        <!-- Title -->
                        <form class="ContactDetails" action="{{ url('add_properties/post' )}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row with-forms">
                                <div class="col-md-6">
                                    <h5>Name</h5>
                                    <input class="search-field" type="text" name="name" value="" required>
                                </div>
                                <!-- Type -->
                                <div class="col-md-6">
                                    <h5>Phone</h5>
                                    <input class="search-field" type="tel" name="phone" value="" required></h5>
                                </div>
                            </div>
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-12">
                                    <h5>Email</h5>
                                    <input class="search-field" type="email" name="email" value="" required></h5>
                                </div>
                            </div>
                            <!-- Row / End -->
                            
                            <!-- section start -->
                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-location"></i> Location</h3>
                            </div>
                            <div class="submit-section">
                                <!-- Row -->
                                <div class="row with-forms">
                                    <!-- City -->
                                    <div class="col-md-12">
                                        <h5>Address</h5>
                                        <input type="text" name="address" placeholder="e.g. 964 School Street">
                                    </div>
                                    <!-- Address -->
                                </div>
                                <!-- Row / End -->
                            </div>
                            <!-- section end -->
                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                            </div>
                            <!-- Dropzone -->
                            <div class="submit-section d-flex">
                                <div class="message p-3">
                                    <label>
                                        <input type="file" class="form-control" name="primary_image">
                                    </label>
                                </div>
                                <div class="message p-3">
                                    <!--<div class="message-inside"> -->
                                    <!--    <div class="custom__image-container">-->
                                    <!--        <input type="file" id="files" name="secondary_images" multiple>-->
                                            <!-- <span>"Click here to upload secondary images"</span> -->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <label>
                                        <input type="file" class="form-control" name="secondary_images[]" multiple>
                                    </label>
                                </div>
                            </div>
                           
                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-docs"></i> Details</h3>
                            </div>
                            <!-- Description -->
                            <div class="form">
                                <h5>Description</h5>
                                <textarea class="WYSIWYG" name="description" cols="10" rows="3" id="summary" spellcheck="true"></textarea>
                            </div>
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Phone -->
                                <div class="col-md-4">
                                    <h5>No. of Bedroom <span></span></h5>
                                    <input type="text" name="bedroom">
                                </div>
                                <!-- Website -->
                                <div class="col-md-4">
                                    <h5>No. of Bathroom<span></span></h5>
                                    <input type="text" name="bathroom">
                                </div>
                                <!-- Email Address -->
                                <div class="col-md-4">
                                    <h5>Outdoor Area <span></span></h5>
                                    <input type="text" name="outdoor_area">
                                </div>
                            </div>
                            <!-- Row / End -->
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Phone -->
                                <div class="col-md-4">
                                    <h5>Gross area sq ft. <span></span></h5>
                                    <input type="text" name="gross_area">
                                </div>
                                <!-- Website -->
                                <div class="col-md-4">
                                    <h5>Net area sq ft. <span></span></h5>
                                    <input type="text" name="net_area">
                                </div>
                           
                                <!-- Email Address -- -->
                                <div class="col-md-4">
                                    <h5 >Price / Night</h5>
                                    <input type="text" name="price">
                                </div>
                            </div>
                            <div class="row with-forms">
                                <div class="col-md-4">
                                    <h5>Capacity <span></span></h5>
                                    <input type="text" name="Capacity">
                                </div>
                            </div>
                            <!-- Row / End -->
                            <!-- Checkboxes -->
                            <h5 class="margin-top-30 margin-bottom-10">Amenities <span></span></h5>
                            
                            <div class="">
                                <label class="container-checkbox">Elevator in building
                                    <input type="checkbox" checked="checked" name="amenities[]" value="Elevator in building">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Friendly workspace
                                    <input type="checkbox" name="amenities[]" value="Friendly workspace">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Instant Book
                                    <input type="checkbox" name="amenities[]" value="Instant Book">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Wireless Internet
                                    <input type="checkbox" name="amenities[]" value="Wireless Internet"> 
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Free parking on premises
                                    <input type="checkbox" name="amenities[]" value="Free parking on premises">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Free parking on street
                                    <input type="checkbox" name="amenities[]" value="Free parking on street">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Smoking allowed
                                    <input type="checkbox" name="amenities[]" value="Smoking allowed">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-checkbox">Events
                                    <input type="checkbox" name="amenities[]" value="Events">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            <!-- Checkboxes / End -->
                            <!-- section end -->
                            <div class="row with-forms p-4">
                                <div class="col-md-12 mt-3" align="center">
                                    <button type="submit" class="btn btn-primary dfgd" id="submit_form">SUBMIT
                                        <i class="icon-paperplane ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Section / End -->
                </div>
            </div>
        </div>
    </div>
</section>


<script>
  const buyRadioButton = document.getElementById('option1');
  const rentRadioButton = document.getElementById('option2');
  const textParagraph = document.getElementById('output');

  buyRadioButton.addEventListener('click', function() {
    textParagraph.style.display = 'block'; 
    textParagraph.textContent = 'Price'; 
  });
  rentRadioButton.addEventListener('click', function() {
    textParagraph.style.display = 'block'; 
    textParagraph.textContent = 'Price / night'; 
  });
  
  var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
  }
});

</script>







@endsection