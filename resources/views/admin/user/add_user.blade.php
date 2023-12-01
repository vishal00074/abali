@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
            <div class="col-sm-6 mb-1" align="left">
                <h6 class="card-title"><b>Add - USER DETAILS</b></h6>
            </div>
            <div class="col-sm-6 mb-1" align="right">
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
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
            <form action="{{ url('admin/submituser') }}" method="post" class="UserDetails">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Mobile No.</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_type">User Type</label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option value="">User type</option>
                                        <option value="1">Landholder</option>
                                        <option value="0">Normal User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">Save
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        if ($(".UserDetails").length > 0) {
            $(".UserDetails").validate({
                rules: {
                    name: "required",
                    phone: {
                        required: true,
                        maxlength: 10,
                        minlength: 10
                    },
                    user_type: "required",
                    password: {
                        required: true,
                        strongPassword: true // Custom rule for strong password
                    }
                },
                messages: {
                    name: "Name field is required.",
                    user_type: "User Type field is required.",
                    phone: {
                        required: "Mobile no. field is required.",
                        maxlength: "Length should be up to 10 digits.",
                        minlength: "Length should be up to 10 digits."
                    },
                    password: {
                        required: "Password field is required.",
                        strongPassword: "The password must contain at least one uppercase letter, one digit, and one special character."
                    }
                },
                // Remove the submitHandler function to allow normal form submission
                // submitHandler: function (form) {
                //     form.submit();
                // }
            });
        }

        $.validator.addMethod("strongPassword", function (value, element) {
            return this.optional(element) || /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/.test(value);
        }, "The password must contain at least one uppercase letter, one digit, and one special character.");
    });

    // You can remove this code block for handling form submission via AJAX
    // $(".UserDetails").submit(function (e) {
    //     e.preventDefault();
    //     let name = $("#name").val();
    //     let email = $("#email").val();
    //     let phone = $("#phone").val();
    //     let user_type = $("#user_type").val();
    //     let password = $("#password").val();

    //     $.ajax({
    //         url: "{{ url('admin/submituser') }}",
    //         type: "POST",
    //         data: {
    //             name: name,
    //             email: email,
    //             phone: phone,
    //             user_type: user_type,
    //             password: password
    //         },
    //         success: function (response) {
    //             if (response) {
    //                 console.log(response);
    //             }
    //         }
    //     });
    // });
</script>
@endsection
