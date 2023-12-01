@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>ADD - HOME-HEADER DETAILS</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin/home_header') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        <div class="card-body"> 
            <form class="headerDetails" name="headerDetails" action="{{url('/admin/home_header/post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control" id="sub_title">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">PUBLISH
                                    <i class="icon-paperplane ml-2"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Background Image</label>
                                    <input type="file" name="background_image" class="form-control" id="background_image">
                                </div>
                            </div>
                            
                            
                        </div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script type="text/javascript">
    const ids = ['#description'];
    ids.forEach((id) => {
        ClassicEditor.create(document.querySelector(id)).catch(error => {
            console.error(error);
        });
    });
    
    
    
    $(document).ready(function(){
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload file with a valid format (.jpg, .jpeg, .png).");
        
        if ($(".headerDetails").length > 0) {
            $(".headerDetails").validate({
                rules: {
                    title : "required",
                    sub_title : "required",
                    background_image : {
                        required: true,
                        
                        fileType: "jpg|jpeg|png|ico|bmp"
                    }
                },
                messages: {
                    title : "title field is required.",
                    
                    description : "Description field is required.",
                    
                    image : {
                        required: "Please upload image."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection