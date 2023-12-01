<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.head')
   
</head>
<body>
    <div class="loading hide"><img src="{{asset('assets/admin/img/loader.gif')}}"></div>
    @if(Auth::guard('admin')->user())
        @include('admin.layouts.header')
        <!-- Page content -->
        <div class="page-content">
            @include('admin.layouts.sidebar')
    @endif
            <!-- Main content -->
    		<div class="content-wrapper">
                <div class="content-inner">
                @if(Auth::guard('admin')->user())
                    @php $bread2=''; @endphp
                    <!-- Page header -->
                    <div class="page-header page-header-light">
                        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                            <div class="d-flex">
                                <h6 class="mt-2">ADMIN - ABALI</h6>
                            </div>
                        </div>
                    </div>
                    <!-- /page header -->
                @endif
    
                @yield('content')
                
                
                
                @if(Auth::guard('admin'))
                    @include('admin.layouts.footer')
                @endif
                </div>
            </div>
            <script>
                var base_url = `<?php echo URL::to('/');?>`;
                var asset_url = `<?php echo URL::to('/');?>`;
                $(document).ready(function(){
                    var success = `<?php echo Session::get('success'); ?>`;
                    if(success){
                        notify('success',success)
                    }
                    
                    var error = `<?php echo Session::get('error'); ?>`;
                    if(error){
                        notify('error',error)
                    }
                });
                var swalInit = swal.mixin({
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-light'
                });
            </script>
            @yield('script')
        </div>
    </body>
</html>