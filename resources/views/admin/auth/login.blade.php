<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Abali - Admin</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('img/fav.jpg') }}" />
    
    <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet" />
    <!-- FontFamily -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="main-wrapper">
        <div class="admin-logo">
            <!--<a href=""><img src="{{ asset('img/abali.png') }}"/></a>-->
        </div>
            
        <div class="auth-wrapper d-flex  no-block justify-content-center align-items-center">

            
            <!-- =============================== Form =============================== -->
            <form class="form-horizontal" id="loginform" action="{{route('adminLoginPost')}}" method="post">
                
                <div class="text-center mb-3">
					<h5 class="mb-0">Login to your admin panel</h5>
				</div>
                
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
                <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" name="email" placeholder="email" aria-label="email" aria-describedby="basic-addon1" required="" />
                            @if ($errors->has('email'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                            </div>
                            <input type="password" class="form-control form-control-lg" id="password"  name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" />
                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group pt-3">
                            <button class="btn vd" type="submit">Login</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- =============================== End - Form =============================== -->
        </div>
    </div>
    
    
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    
    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>
</html>