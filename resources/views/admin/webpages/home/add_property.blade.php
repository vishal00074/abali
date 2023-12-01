@extends('admin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="h3">ADD - HOME PROPERTY</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/home_property/post') }}" method="post">
                               
                                @csrf

                                <div class="form-group">
                                    <label for="property_dropdown">Property</label>
                                    <select name="property_id" id="property_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($property as $properties)
                                            <option value="{{ $properties->id }}">{{ $properties->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select</option>
                                        <option value="0">Landscape</option>
                                        <option value="1">Portrait</option>
                                    </select>
                                    @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="border-top mt-3 pt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('/admin/home') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
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