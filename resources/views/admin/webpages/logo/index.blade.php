@extends('admin.app')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row p-1 mb-2">
                        <div class="col-lg-5 mt-2">
                            <div class="h3">LOGO</div>
                        </div>
                        <div class="col-lg-6 mt-2" align="right">
                            <a href="{{url('/admin/logo/add')}}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i>ADD</a>
                        </div>
                    </div>
                    
                    <div class="table-responsive mt-3 p-2">
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
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.NO.</th>
                                    <th>IMAGE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($logo->count() > 0)
                                    <?php $i=1; ?> 
                                    @foreach($logo as $detail)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <img src="{{$detail->image}}" height="70px" width="85px" alt=" ">
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/logo',$detail->id)}}" class="btn btn-success btn-sm">EDIT</a>
                                            <a href="javascript:void(0)" data-id="{{ $detail->id }}" class="delete-logo btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <td colspan="2" align="center">NO RECORDS FOUND</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- =================== Delete Modal =================== -->
<!--<div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>-->
<!--            </div>-->
            
<!--            <form action="{{url('admin/logo/delete')}}">-->
<!--                @csrf-->
<!--                <div class="modal-body">-->
<!--                    <input type="hidden" name="RowId" value="" id="RowId">-->
<!--                    <p>Are you sure you want to delete?</p>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="submit" class="btn btn-primary">DELETE</button>-->
<!--                    <button type="button" class="btn btn-secondary" id="closeModal"  data-bs-dismiss="modal">CLOSE</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- =================== END - Delete Modal =================== -->
@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        // Initialize DataTable.
        
        
        $('body').on('click', '.delete-logo', function () {
            var id = $(this).attr('data-id');
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, do not cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('/admin/logo/delete') }}"+'/'+id,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (response) {
                            swalInit.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            .then((willDelete) => {
                                location.reload();
                            });
                        },
                        error: function (response) {
                            swalInit.fire(
                                'Error deleting!',
                                'Please try again!',
                                'error'
                            )
                        }
                    });
                }
                else if (result.dismiss === swal.DismissReason.cancel) {
                    swalInit.fire(
                        'Cancelled',
                        'Your imaginary file is safe.',
                        'error'
                    )
                }
            });
        });
    });
</script>
@endsection