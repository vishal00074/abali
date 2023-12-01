@extends('admin.app')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-lg-12 p-1">
                        <div class="h3 mt-2">EDIT - LOGO</div>
                        <div align="right" >
                            <a href="{{url('/admin/logo')}}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i>Back</a>
                        </div>
                    </div>
                    <form class="logo p-2" action="{{url('/admin/logo/post')}}" method="post" enctype="multipart/form-data">
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
                        
                        @csrf                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script type="text/javascript">
    
    
    
    
    $(document).ready(function(){
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload file with a valid format (.jpg, .jpeg, .png).");
        
        if ($(".logo").length > 0) {
            $(".logo").validate({
                rules: {
                    
                    image : {
                        required: true,
                        
                        fileType: "jpg|jpeg|png|ico|bmp"
                    }
                },
                messages: {
                    
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