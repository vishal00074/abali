@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        <div class ="card-header header-elements-inline s-filter">
            <div class="col-md-6">
                <h6 class="card-title"><b>Payment List</b></h6></div>
                <!-- <a href="">
                   <button type="button" class="btn btn-primary btn-sm" ><i class="icon-plus-circle2 mr-2"></i> Add</button>
                </a> -->
                <div class="col-md-6 text-right">
                <a href="{{ url('/admin') }}" class="btn-success"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				
            </div> 
        </div>
        <table class="table get_user_list">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Property Name</th>
                    <th>Landholder Name</th>
                    <th>Amount</th>
                    <th>ACTION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!--<div class="modal" tabindex="-1" role="dialog" id="approved" >-->
<!--  <div class="modal-dialog modal-sm" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
          <!--<span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <form action="{{ url('admin/approve') }}" method="get" >-->
<!--          <div class="modal-body">-->
<!--              <input type="hidden" name="id" value=""id="get_approve_id">-->
<!--            <p>Do you want to approve property?</p>-->
<!--          </div>-->
<!--          <div class="modal-footer" align="center">-->
<!--            <button type="submit" class="btn-sm btn btn-success">Yes</button>-->
<!--            <button type="button" class="btn-sm btn btn-danger" data-dismiss="modal">No</button>-->
<!--          </div>-->
<!--      </form>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!--<div class="modal" tabindex="-1" role="dialog" id="Unapproved" >-->
<!--  <div class="modal-dialog modal-sm" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
          <!--<span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <form action="" method="get" >-->
<!--          <div class="modal-body">-->
<!--              <input type="hidden" name="id" value=""id="get_id">-->
<!--            <p>Do you want to unapprove property?</p>-->
<!--          </div>-->
<!--          <div class="modal-footer" align="center">-->
<!--            <button type="submit" class="btn-sm btn btn-success">Yes</button>-->
<!--            <button type="button" class="btn-sm btn btn-danger" data-dismiss="modal">No</button>-->
<!--          </div>-->
<!--      </form>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
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

        // init datatable.
        var dataTable = $('.get_user_list').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            //pageLength: 5,
            scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: "{{ url('/admin/payments') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'property_name', name: 'property_name'},
                {data: 'username', name: 'username'},
                {data: 'price', name: 'price'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false}
            ]
        });
        
        // $('body').on('click', '.delete-queries', function () {
        //     var id = $(this).attr('data-id');
        //     swalInit.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, cancel it!',
        //         cancelButtonText: 'No, do not cancel!',
        //         confirmButtonClass: 'btn btn-success',
        //         cancelButtonClass: 'btn btn-danger',
        //         buttonsStyling: false
        //     }).then(function(result) {
        //         if(result.value) {
        //             $.ajax({
        //                 type:'DELETE',
        //                 url : "{{ url('/admin/delete_property') }}"+'/'+id,
        //                 success: function (response) {
        //                     swalInit.fire(
        //                         'Deleted!',
        //                         'Your file has been deleted.',
        //                         'success'
        //                     )
        //                     .then((willDelete) => {
        //                         location.reload();
        //                     });
        //                 },
        //                 error: function (response) {
        //                     swalInit.fire(
        //                         'Error deleting!',
        //                         'Please try again!',
        //                         'error'
        //                     )
        //                 }
        //             });
        //         }
        //         else if (result.dismiss === swal.DismissReason.cancel) {
        //             swalInit.fire(
        //                 'Cancelled',
        //                 'Your imaginary file is safe.',
        //                 'error'
        //             )
        //         }
        //     });
        // });
    });
    
    function Unapproved(src){
        var id = src.name;
        $('#get_id').val(id);
    }
    
    function approved(src){
        var id = src.name;
        $('#get_approve_id').val(id);
    }
</script>
@endsection
<!-- ========== table components end ========== -->

