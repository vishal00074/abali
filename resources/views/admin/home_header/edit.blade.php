@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>EDIT - HEADER DETAILS</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin/home_header') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        <div class="card-body"> 
            <form class="HeaderDetails" action="{{url('/admin/home_header/update',$header->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$header->title ?? ''}}">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <textarea name="sub_title" class="form-control" id="sub_title" >{{$header->sub_title ?? ''}}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="p-2">
                                <img src="{{$header->background_image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <label>Background Image</label>
                                    <input type="file" name="background_image" class="form-control" id="background_image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">UPDATE
                                    <i class="icon-paperplane ml-2"></i>
                                </button>
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
    
    ClassicEditor.create(document.querySelector('#description')).catch(error => {
        console.error(error);
    });
    
    
        $(document).ready(function(){
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload file with a valid format (.jpg, .jpeg, .png).");
    
        
        if ($(".HeaderDetails").length > 0) {
            $(".HeaderDetails").validate({
                rules: {
                    title : "required",
                    sub_title : "required",
                    background_image : {
                        fileType: "jpg|jpeg|png|ico|bmp"
                    }
                },
                messages: {
                    title : "title field is required.",
                    
                    description : "Description field is required.",
                    
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection