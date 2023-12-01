@extends('admin.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
            <div class="col-sm-6 mb-1" align="left">
                <h6 class="card-title"><b>Add - PROPERTY DETAILS</b></h6>
            </div>
            <div class="col-sm-6 mb-1" align="right">
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ url('/admin/property_list') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ url('admin/update_property',$data->id) }}" method="post" class="PropertyDetails" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$data->name ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$data->email ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{$data->phone ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{$data->address ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="{{ $data->primary_image }}" alt="img" height="100px" width="200px">
                            <label for="primary_image">Primary Image</label>
                            <input type="file" name="primary_image" class="form-control" id="primary_image" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @if(isset($data->secondary_images) && is_string($data->secondary_images))
                                @foreach(json_decode($data->secondary_images) as $imagePath)
                                    <img src="{{ asset($imagePath) }}" alt="Image" height="100px" width="200px">
                                @endforeach
                            @endif
                            <label for="secondary_images">Secondary Images</label>
                            <input type="file" name="secondary_images[]" class="form-control" id="secondary_images" value="" multiple>
                        </div>
                    </div>
                </div>
                <!-- Add more rows and fields here as needed -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" value="{{$data->description ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bedroom">Bedroom</label>
                            <input type="text" name="bedroom" class="form-control" id="bedroom" value="{{$data->bedroom ?? '0'}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Bathroom</label>
                            <input type="text" name="bathroom" class="form-control" id="bathroom" value="{{$data->bathroom ?? '0'}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Outdoor Area</label>
                            <input type="text" name="outdoor_area" class="form-control" id="outdoor_area" value="{{$data->outdoor_area ?? '0'}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Net Area</label>
                            <input type="text" name="net_area" class="form-control" id="net_area" value="{{$data->net_area ?? '0'}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Gross Area</label>
                            <input type="text" name="gross_area" class="form-control" id="gross_area" value="{{$data->gross_area ?? '0'}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Price</label>
                            <input type="text" name="price" class="form-control" id="price" value="{{$data->price ?? '0'}}">
                        </div>
                    </div>
                    <div class="col-md-6">
    <div class="form-group">
        <label>Amenities</label>
        @php
            $selectedAmenities = is_array($data->amenities) ? $data->amenities : explode(',', $data->amenities);
        @endphp
        
        <select class="form-control chosen-select" multiple id="amenities" name="amenities[]">
            <option value="">Select</option>
            <option value="Elevator in building" {{ in_array('Elevator in building', $selectedAmenities) ? 'selected' : '' }}>Elevator in building</option>
            <option value="Friendly workspace" {{ in_array('Friendly workspace', $selectedAmenities) ? 'selected' : '' }}>Friendly workspace</option>
            <option value="Instant Book" {{ in_array('Instant Book', $selectedAmenities) ? 'selected' : '' }}>Instant Book</option>
            <option value="Wireless Internet" {{ in_array('Wireless Internet', $selectedAmenities) ? 'selected' : '' }}>Wireless Internet</option>
            <option value="Free parking on premises" {{ in_array('Free parking on premises', $selectedAmenities) ? 'selected' : '' }}>Free parking on premises</option>
            <option value="Free parking on street" {{ in_array('Free parking on street', $selectedAmenities) ? 'selected' : '' }}>Free parking on street</option>
            <option value="Smoking allowed" {{ in_array('Smoking allowed', $selectedAmenities) ? 'selected' : '' }}>Smoking allowed</option>
            <option value="Events" {{ in_array('Events', $selectedAmenities) ? 'selected' : '' }}>Events</option>
        </select>
        @if ($errors->has('amenities'))
            <span class="text-danger">{{ $errors->first('amenities') }}</span>
        @endif
    </div>
</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Capacity</label>
                            <input type="text" name="capacity" class="form-control" id="capacity" value="{{$data->capacity ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit_form">Save
                            <i class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- /page length options -->
</div>
@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>


<script type="text/javascript">
   

    $(document).ready(function() {
        $('.chosen-select').chosen();
        
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload a file with a valid format (.jpg, .jpeg, .png).");

        if ($(".PropertyDetails").length > 0) {
            $(".PropertyDetails").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                        digits: true
                    },
                    address: "required",
                    description: "required",
                    bedroom: {
                        required: true,
                        digits: true
                    },
                    bathroom: {
                        required: true,
                        digits: true
                    },
                    outdoor_area: {
                        required: true,
                        number: true
                    },
                    net_area: {
                        required: true,
                        number: true
                    },
                    gross_area: {
                        required: true,
                        number: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    "amenities[]": "required",
                    primary_image: {
                        fileType: "jpg|jpeg|png"
                    },
                    "secondary_images[]": {
                        fileType: "jpg|jpeg|png"
                    }
                },
                messages: {
                    name: "Name field is required.",
                    email: {
                        required: "Email field is required.",
                        email: "Please enter a valid email address."
                    },
                    phone: {
                        required: "Phone field is required.",
                        maxlength: "Phone number must be 10 digits long.",
                        minlength: "Phone number must be 10 digits long.",
                        digits: "Phone number must contain only digits."
                    },
                    address: "Address field is required.",
                    description: "Description field is required.",
                    bedroom: {
                        required: "Bedroom field is required.",
                        digits: "Bedroom must be a numeric value."
                    },
                    bathroom: {
                        required: "Bathroom field is required.",
                        digits: "Bathroom must be a numeric value."
                    },
                    outdoor_area: {
                        required: "Outdoor Area field is required.",
                        number: "Outdoor Area must be a numeric value."
                    },
                    net_area: {
                        required: "Net Area field is required.",
                        number: "Net Area must be a numeric value."
                    },
                    gross_area: {
                        required: "Gross Area field is required.",
                        number: "Gross Area must be a numeric value."
                    },
                    price: {
                        required: "Price field is required.",
                        number: "Price must be a numeric value."
                    },
                    "amenities[]": "Amenities field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection
