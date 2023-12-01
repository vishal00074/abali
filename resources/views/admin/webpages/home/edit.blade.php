@extends('admin.app')
@section('content')

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section-title mb-4">
                <div class="row p-1 mb-2">
                    <div class="col-lg-5 mt-2">
                        <div class="h3">Home - Property</div>
                    </div>
                    <div class="col-lg-6 mt-2" align="right">
                        <a href="{{url('/admin/home_property/add')}}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i>ADD</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label class="section-label">Portrait</label>
                        
                            @foreach($property_portrait as $portrait)
                                <img src="{{$portrait->primary_image ?? ''}}" alt="{{$portrait->name}}" height="100px" width="100px">
                                <label><b>{{$portrait->name}}</b></label>
                            @endforeach
                </div>
                <div class="col-md-12">
                    <label class="section-label">Landscape</label>
                    <div class="row landscape-container">
                        @foreach($property_landscape as $landscape)
                            <div class="col-md-6 landscape-item">
                                <img src="{{$landscape->primary_image ?? ''}}" alt="{{$landscape->name}}" height="100px" width="100px">
                                <label><b>{{$landscape->name}}</b></label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section-title mb-4">
                <h2>Features</h2>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="">
                        <div class="icon"><img src="{{$facilities->image}}" alt="img" height="60px" width="60px" /></div>
                        <h4 class="title"><a href="" data-toggle="modal" data-target="#Facilities">{{$facilities->title}}</a></h4>
                        <!--<p class="description">{{$facilities->description}}</p>-->
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="">
                        <div class="icon"><img src="{{$facilities1->image}}" alt="img" /></div>
                        <h4 class="title"><a href="" data-toggle="modal" data-target="#Financial">{{$facilities1->title}}</a></h4>
                        <!--<p class="description">{{$facilities1->description}}</p>-->
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="">
                        <div class="icon"><img src="{{$facilities2->image}}" alt="img" /></div>
                        <h4 class="title"><a href="" data-toggle="modal" data-target="#Valuation">{{$facilities2->title}}</a></h4>
                        <!--<p class="description">{{$facilities2->description}}</p>-->
                    </div>
                </div>
            
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="">
                        <div class="icon"><img src="{{$facilities3->image}}" alt="img" /></div>
                        <h4 class="title"><a href="" data-toggle="modal" data-target="#Management">{{$facilities3->title}}</a></h4>
                        <!--<p class="description">{{$facilities3->description}}</p>-->
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="">
                        <div class="icon"><img src="{{$facilities4->image}}" alt="img" /></div>
                        <h4 class="title"><a href="" data-toggle="modal" data-target="#Detailed">{{$facilities4->title}}</a></h4>
                        <!--<p class="description">{{$facilities4->description}}</p>-->
                    </div>
                </div>
            
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="">
                        <div class="icon"><img src="{{$facilities5->image}}" alt="img" /></div>
                        <h4 class="title"><a href="" data-toggle="modal" data-target="#Property">{{$facilities5->title}}</a></h4>
                        <!--<p class="description">{{$facilities5->description}}</p>-->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
    
    
    
    
<!--//Modals-->
<div class="modal-section">
    <div class="modal fade Facilities" id="Facilities" role="dialog" align="center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3>Features</h3>
        
            <div class="modal-body">
                <form action="{{ url('/admin/facilities',$facilities->id)}}" method="POST" enctype="multipart/form-data" align="left">
                    @csrf
                    <input type="hidden" name="id" value="{{$facilities->id}}">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" value="{{$facilities->title}}">
                    <label>Service Description</label>
                    <input type="text" name="description" class="form-control" value="{{$facilities->description}}">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="form-control"><img src="{{$facilities->image}}" alt="" height="80px" width="80px">
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit_form">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
    
    

<div class="modal fade" id="Financial" role="dialog" align="center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3>Features</h3>
            <div class="modal-body">
                <form action="{{ url('/admin/facilities',$facilities1->id)}}" method="POST" enctype="multipart/form-data" align="left">
                    @csrf
                    <input type="hidden" name="id" value="{{$facilities1->id}}">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" value="{{$facilities1->title}}">
                    <label>Service Description</label>
                    <input type="text" name="description" class="form-control" value="{{$facilities1->description}}">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="form-control"><img src="{{$facilities1->image}}" alt="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit_form">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="Valuation" role="dialog" align="center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3>Features</h3>
            <div class="modal-body">
                <form action="{{ url('/admin/facilities',$facilities2->id)}}" method="POST" enctype="multipart/form-data" align="left">
                    @csrf
                    <input type="hidden" name="id" value="{{$facilities2->id}}">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" value="{{$facilities2->title}}">
                    <label>Service Description</label>
                    <input type="text" name="description" class="form-control" value="{{$facilities2->description}}">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="form-control"><img src="{{$facilities2->image}}" alt="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit_form">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="Management" role="dialog" align="center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3>Features</h3>
            <div class="modal-body">
                <form action="{{ url('/admin/facilities',$facilities3->id)}}" method="POST" enctype="multipart/form-data" align="left">
                    @csrf
                    <input type="hidden" name="id" value="{{$facilities3->id}}">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" value="{{$facilities3->title}}">
                    <label>Service Description</label>
                    <input type="text" name="description" class="form-control" value="{{$facilities3->description}}">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="form-control"><img src="{{$facilities3->image}}" alt="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit_form">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="Detailed" role="dialog" align="center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3>Features</h3>
            <div class="modal-body">
                <form action="{{ url('/admin/facilities',$facilities4->id)}}" method="POST" enctype="multipart/form-data" align="left">
                    @csrf
                    <input type="hidden" name="id" value="{{$facilities4->id}}">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" value="{{$facilities4->title}}">
                    <label>Service Description</label>
                    <input type="text" name="description" class="form-control" value="{{$facilities4->description}}">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="form-control"><img src="{{$facilities4->image}}" alt="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit_form">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="Property" role="dialog" align="center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3>Features</h3>
            <div class="modal-body">
                <form action="{{ url('/admin/facilities',$facilities5->id)}}" method="POST" enctype="multipart/form-data" align="left">
                    @csrf
                    <input type="hidden" name="id" value="{{$facilities5->id}}">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" value="{{$facilities5->title}}">
                    <label>Service Description</label>
                    <input type="text" name="description" class="form-control" value="{{$facilities5->description}}">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="form-control"><img src="{{$facilities5->image}}" alt="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit_form">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')


<script type="text/javascript">
   

    $(document).ready(function() {
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload a file with a valid format (.jpg, .jpeg, .png).");

        if ($(".Facilities").length > 0) {
            $(".Facilities").validate({
                rules: {
                    image: {
                        fileType: "jpg|jpeg|png"
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