@extends('admin.app')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-lg-12 p-1">
                        <div class="h3  mt-2 mb-3">BOOKING DETAILS</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-10 justify-content-between mb-4">
                        <div class="d-flex flex-column gap-10">
                            <h4 class="text-capitalize heading">Booking ID #{{$booking->bookingID}}</h4>
                            <div class="calendar">
                                <i class="me-2 mdi mdi-calendar-check"></i>Check-In:  <span class="mt-2 m-2">{{\Carbon\Carbon::parse($booking->check_in)->format('d-F-Y')}}</span><br>
                                <i class="me-2 mdi mdi-calendar-check"></i>Check-Out:  <span class="mt-2">{{\Carbon\Carbon::parse($booking->check_out)->format('d-F-Y')}}</span>
                            </div>
                            
                        </div>
                        <!--<div class="text-sm-right">-->
                        <!--    <div class="d-flex flex-column gap-2 mt-3">-->
                        <!--        <div class="order-status d-flex justify-content-sm-end gap-10 text-capitalize">-->
                        <!--            <span class="title-color">Status: </span>-->
                        <!--            <span >-->
                        <!--                @if($booking->status === '0')-->
                        <!--                    Not Recevied Yet-->
                        <!--                @elseif($booking->status === '1')-->
                        <!--                    Half Payment Recevied-->
                        <!--                @elseif($booking->status === '2')-->
                        <!--                    Payment Recevied-->
                        <!--                @endif -->
                        <!--            </span>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="card" style="padding: 0 !important;">
                        <div class="card-body">
                            <h4 class="mb-4 d-flex gap-2 customer">
                                User information
                            </h4>
                            <div class="media ">
                                
                                <div class="media-body d-flex flex-column" >
                                    <span class="title-color"><strong>{{$booking->user_name ?? ''}}</strong></span>
                                    <span class="title-color break-all"><strong>{{$booking->user_phone ?? ''}}</strong></span>
                                    <span class="title-color break-all">{{$booking->user_email ?? ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table class="table fz-12 table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                        <th>Property Name</th>
                                        <th>Amount</th>
                                        <th>Total Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{$booking->property_name ?? ''}}</td>
                                <td>{{$booking->price ?? ''}}</td>
                                <td>{{$booking->guests ?? ''}}</td>
                            </tbody>
                        </table>
                    </div>
                    
                        </div>
                        <div class="col-md-4">
                            <!--<form class="p-2" action="{{url('/admin/booking/update',$booking->id)}}" method="post" enctype="multipart/form-data">-->
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
                                
                                <!--@csrf                    -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Payment Status</label>
                                                @if($booking->status == '1')
                                                <input type="text" name="status" value="Success" disabled>
                                                @else
                                                <input type="text" name="status" value="Pnding" >
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                

                                
                      
                            <!--    <div class="border-top">-->
                            <!--        <div class="card-body">-->
                            <!--            <button type="submit" class="btn btn-primary">update</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!--<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>-->

<!--<script type="text/javascript">-->
<!--    ClassicEditor.create( document.querySelector( '#description' ) ).catch( error => {-->
<!--        console.error(error);-->
<!--    });-->
<!--</script>-->

<script type="text/javascript">
    $(document).ready(function() {
        var select = document.getElementById("SelectOption");
        var beforeSelect = select.selectedIndex;
        for (var i = 0; i < select.options.length; i++) {
            if (i < beforeSelect) {
                select.options[i].style.display = "none";
            } else {
                select.options[i].style.display = "block";
            }
        }
    });
</script>
@endsection