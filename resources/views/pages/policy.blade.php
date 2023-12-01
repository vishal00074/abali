@extends('layouts.index')
@section('content')
	<!--==================================================-->
	<!----- End NVQ Main Menu Area ----->
	<!--==================================================-->
	
	<!-- ============================================================== -->
	<!-- Start NVQ Breatcome Area -->
	<!-- ============================================================== -->
	<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Privacy Policy</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>Privacy Policy</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact_address_area pt-80 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title mb-55">
						<div class="section_main_title">{!! $policy->description ?? '' !!}</div>
					</div>
	            </div>
			</div>
		</div>
	</div>
@endsection