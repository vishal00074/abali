@extends('layouts.index')
@section('content')
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row ">
                <div class="add-listing-section">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="ti-write"></i> Basic Informations</h3>
                    </div>
                    
                    <section class="my-5">
                		<div class="container">
                			<div class="bg-white shadow border tabs-section rounded-lg d-block">
                			    <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="nav-item"><a href="#account" class="nav-link active sdsd" data-toggle="tab">Account</a></li>
                                    @if($data['user_type'] == 1)
                                        <li class="nav-item"><a href="#properties" class="nav-link sdsd" data-toggle="tab">Properties</a></li>
                                    @endif
                                </ul>
                			    
                				
                				<div class="tab-content">
                                    <div class="tab-pane fade show active p-4" id="account">
                						<h3 class="mb-4">Account Settings</h3>
                						<form action="{{ url('update_profile') }}" method="post">
                							@csrf
                    						<input type="hidden" name="id" value="{{ $data->id }}">
                    						<div class="row">
                    							<div class="col-md-6">
                    								<div class="form-group">
                    								  	<label>Name</label>
                    								  	<input type="text" class="form-control" name="name" value="{{ $data->name }}">
                    									  @if ($errors->has('name'))
                    									<span class="text-danger">{{ $errors->first('name') }}</span>
                    									@endif
                    								</div>
                    							</div>
                    							<div class="col-md-6">
                    								<div class="form-group">
                    								  	<label>Email</label>
                    								  	<input type="text" class="form-control" name="email" value="{{ $data->email }}" disabled>
                    								</div>
                    							</div>
                    							<div class="col-md-6">
                    								<div class="form-group">
                    								  	<label>Phone number</label>
                    								  	<input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
                    									  @if ($errors->has('phone'))
                    									<span class="text-danger">{{ $errors->first('phone') }}</span>
                    									@endif
                    								</div>
                    							</div>
                    						</div>
                    						<div>
                    							<button type="submit" class="btn aply ml-0 btn-primary dfgd">UPDATE</button>
                    						</div>
                						</form>
                					</div>
                					
                					@if($data['user_type'] == 1)
                					
                					<div class="tab-pane fade show p-4" id="properties">
                                        <h3 class="mb-4">Property List</h3>
                						<div class="row course-list">
                						@foreach($properties as $propertie)
                							<div class="col-md-6">
                								<div class="form-group">
                									<div class="row">
                										<div class="col-sm-12">
                									    	<img src="{{ $propertie->primary_image }}" height="100px"  width="100%" alt="Property_Image"/>
                											<div class="mt-3">
                											    <h5 class="dge3"><a href="{{url('property-details',$propertie->id) }}">{{ $propertie->name }}</a></h5>
            											    </div>
                											<div><p>{{ $propertie->description }}</p></div>
                											<div><b><a class="hnjg" href="{{url('property-details',$propertie->id) }}">Detail</a></b></div>
                										</div>
                                                   </div>
                								 </div>
                							</div>
                						@endforeach
                						</div>
                                    </div>
                					@endif
                				</div>
                				
                			</div>
                		</div>
                	</section>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        // Initialize tabs
        $('.nav-tabs a').click(function() {
            $(this).tab('show');
        });
    });
</script>
@endsection    
