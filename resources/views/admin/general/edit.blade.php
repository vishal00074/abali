@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title">Website Settings</h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<a href="{{ url('/admin') }}" class="btn-success"> <i class="icon-circle-left2 mr-1"></i> Back</a>
			</div>
        </div>
        <div class="card-body"> 
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#general" class="nav-link active" data-toggle="tab">General</a></li>
                <li class="nav-item"><a href="#footer" class="nav-link" data-toggle="tab">Footer</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane fade show active" id="general">
                    <form class="GeneralDetails" name="LevelDetails" action="{{ url('admin/general/post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <div class="row">
                            <h4>SOCIAL LINKS</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-2">
                                            <img src="{{$footer->logo ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />
                                        </div>
                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input type="file" name="logo" class="form-control" id="logo">	         			
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control" id="facebook" value="{{$general->facebook ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" class="form-control" id="twitter" value="{{$general->twitter ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pinterest</label>
                                            <input type="text" name="pinterest" class="form-control" id="pinterest" value="{{$general->pinterest ?? ''}}">	         			
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            <input type="text" name="youtube" class="form-control" id="youtube" value="{{$general->youtube ?? ''}}">	         			
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" name="instagram" class="form-control" id="instagram" value="{{$general->instagram ?? ''}}">	         			
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <button type="submit" class="btn btn-primary" id="submit_form">UPDATE <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show" id="footer">
                    <form class="FooterDetails" name="LevelDetails" action="{{ url('admin/footer/post') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <div class="row">   
                            <h4>FOOTER </h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Footer Title</label>
                                            <input type="text" class="form-control EligibilityMarks" id="footer_title" name="footer_title" value="{{$footer->footer_title ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Footer Description</label>
                                            <textarea name="footer_description" class="form-control" id="footer_description" >{{$footer->footer_description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--<h4>CONTACT DETAILS </h4>-->
                            <!--<div class="col-md-12">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Contact Title</label>-->
                            <!--                <input type="text" class="form-control EligibilityMarks" id="title" name="title" value="{{$footer->title ?? ''}}">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Address</label>-->
                            <!--                <input type="text" class="form-control MonthsInTerm" id="address" name="address" value="{{$footer->address ?? ''}}">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-12">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Email</label>-->
                            <!--                <input type="text" class="form-control MonthsInTerm" id="email" name="email" value="{{$footer->email ?? ''}}">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Phone</label>-->
                            <!--                <input type="text" class="form-control MonthsInTerm" id="phone" name="phone" value="{{$footer->phone ?? ''}}">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <h4>FOOTER BOTTOM </h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Copyright</label>
                                            <input type="text" class="form-control MonthsInTerm" id="copyright" name="copyright" value="{{$footer->copyright ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary" id="submit_form">UPDATE <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /page length options -->
</div>
@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{asset('assets/admin/global_assets/js/demo_pages/form_multiselect.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>


<script type="text/javascript">

    ClassicEditor.create(document.querySelector('#footer_description')).catch(error => {
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
        
        if ($(".GeneralDetails").length > 0) {
            $(".GeneralDetails").validate({
                rules: {
                    logo: {
                        fileType: "jpg|jpeg|png|ico|bmp"
                        },
                    facebook: "required",
                    twitter:"required",
                    pinterest: "required",
                    youtube: "required",
                    instagram: "required"
                },
                messages: {
                    facebook: "Facebook field is required.",                   
                    twitter: "Twitter field is required.",
                    pinterest: "Pinterest field is required.",
                    youtube: "Youtube field is required.",
                    instagram: "Instagram field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
    
    $(document).ready(function(){
        
        
        if ($(".FooterDetails").length > 0) {
            $(".FooterDetails").validate({
                rules: {
                    
                    footer_description:"required",
                    footer_title: "required",
                    copyright: "required"
                },
                messages: {
                    footer_description: "Footer Description field is required.",                   
                    footer_title: "Footer Title field is required.",
                    copyright: "Copyright field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection