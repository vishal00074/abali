@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>ABOUT US</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        <div class="card-body"> 
            <form class="ContactDetails" action="{{url('/admin/about_us/post')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" value="1">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$about->title ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4">{{$about->description ?? ''}}</textarea>
                                </div>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>TitleA</label>-->
                            <!--        <input type="text" name="titleA" class="form-control" id="titleA" value="{{$about->titleA ?? ''}}">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Column 1</label>-->
                            <!--            <textarea name="column1" class="form-control" id="column1">{{$about->column1 ?? ''}}</textarea>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>TitleB</label>-->
                            <!--        <input type="text" name="titleB" class="form-control" id="titleB" value="{{$about->titleB ?? ''}}">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Column 2</label>-->
                            <!--        <textarea name="column2" class="form-control" id="column2">{{$about->column2 ?? ''}}</textarea>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                        </div>
                        
                        <div class="row">
                            <h4>SEO SECTION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" value="{{$seo->seo_title ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Keyword</label>
                                    <input type="text" name="seo_keyword" class="form-control" id="seo_keyword" value="{{$seo->seo_keyword ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="seo_description" value="{{$seo->seo_description ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<div class="p-2">-->
                                    <!--    <img src="{{$about->image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />-->
                                    <!--</div>-->
                                    <div>
                                        <img src="{{$about->image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<div class="p-2">-->
                                    <!--    <img src="{{$about->image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />-->
                                    <!--</div>-->
                                    <div>
                                        <img src="{{$about->image1 ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />
                                        <label>Second Image</label>
                                        <input type="file" name="image1" class="form-control" id="image1">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<div class="p-2">-->
                                    <!--    <img src="{{$about->image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />-->
                                    <!--</div>-->
                                    <div>
                                        <img src="{{$about->background_image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />
                                        <label>Background Image</label>
                                        <input type="file" name="background_image" class="form-control" id="background_image">
                                    </div>
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
    const ids = ['#description'];
    ids.forEach((id) => {
        ClassicEditor.create(document.querySelector(id)).catch(error => {
            console.error(error);
        });
    });

    $(document).ready(function() {
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload a file with a valid format (.jpg, .jpeg, .png).");

        if ($(".ContactDetails").length > 0) {
            $(".ContactDetails").validate({
                rules: {
                    title: "required",
                    description: "required",
                    seo_title: "required",
                    seo_keyword: "required",
                    seo_description: "required",
                    image: {
                        fileType: "jpg|jpeg|png"
                    },
                    image1: {
                        fileType: "jpg|jpeg|png"
                    },
                    background_image: {
                        fileType: "jpg|jpeg|png"
                    }
                },
                messages: {
                    title: "Title field is required.",
                    description: "Description field is required.",
                    seo_title: "SEO title field is required.",
                    seo_keyword: "SEO keyword field is required.",
                    seo_description: "SEO description field is required.",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection