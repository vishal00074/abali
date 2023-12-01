  <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Abali Accomodation LTD</title>
	
	
	<!-- Standard SEO -->
		
    
    <!-- Favicon -->
	<link rel="icon" type="image/png" href="{{asset('assets/admin/img/fav.jpg')}}">
    
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}" />
    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet" type="text/css">
    
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('assets/admin/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('assets/admin/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script src="{{asset('assets/admin/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <!-- <script src="{{asset('assets/admin/js/app.js')}}"></script> -->
    
    <script src="{{asset('assets/admin/global_assets/js/plugins/notifications/pnotify.min.js')}}"></script>
    <!-- <script src="{{asset('assets/admin/global_assets/js/demo_pages/extra_sweetalert.js')}}"></script> -->
    
    <!-- /theme JS files -->
    <script src="{{asset('assets/admin/js/custom.js')}}?time=<?=time()?>"></script>

    @yield('css')
    