@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card wlcm">
                <div class="row">
                    <div class="col-md-5 p-4">
                        <img src="{{asset('assets/admin/img/dashboard.jpg')}}" alt=" "  width="340px">
                    </div>
                    <div class="col-md-7 p-4">
                        <h4>Welcome <span>Back</span></h4>
                    </div>
                </div>
            </div>
            
            <div class="row dashboard">
                @if(auth()->guard('admin')->user())
                <div class="col-md-3">
                    <div class="card bg-teal-400 p-3 text-center">
                        <div class="card-body">
                            <h4>Land Holders</h4>
                            <div>
                                <a href="{{ url('admin/get_landholder_list') }}" class="btn btn-white btn-sm text-dark">VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-teal-400 p-3 text-center">
                        <div class="card-body">
                            <h4>Properties</h4>
                            <div>
                                <a href="" class="btn btn-white btn-sm text-dark">VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-teal-400 p-3 text-center">
                        <div class="card-body">
                            <h4>Users</h4>
                            <div>
                                <a href="{{ url('admin/user_list') }}" class="btn btn-white btn-sm text-dark">VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-teal-400 p-3 text-center">
                        <div class="card-body">
                            <h4>User Queries</h4>
                            <div>
                                <a href="{{url('/admin/user_queries')}}" class="btn btn-white btn-sm text-dark">VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endif
            </div>
        </div>
    </div>
</div>
@endsection