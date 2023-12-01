@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        <div class ="card-header header-elements-inline s-filter">
            <div class="col-md-6">
                <h6 class="card-title"><b>Landholder Property  List</b></h6></div>
                <!-- <a href="{{url('/admin/user_queries')}}">
                   <button type="button" class="btn btn-primary btn-sm" ><i class="icon-plus-circle2 mr-2"></i> Add</button>
                </a> -->
                <div class="col-md-6 text-right">
              <a href="{{ url('/admin/add_user') }}" class="btn btn-primary" > <i class="icon-circle-left2 mr-1"></i> Add</a>
              <a href="{{ url('/admin/get_landholder_list') }}" class="btn-success"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				
            </div> 
        </div>
        
        <table class="table landholder_list">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Property Name</th>
                    <th>Image</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            
        </table>
    </div>
</div>
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
        var dataTable = $('.landholder_list').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            //pageLength: 5,
            scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: "{{ route('property_list',$id) }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'name', name: 'name'},
                {
                    data: 'primary_image',
                    name: 'primary_image',
                    render: function (data, type, full, meta) {
                        // Assuming 'primary_image' contains the URL of the image
                    if (type === 'display' && data) {
                                return '<img src="' + data + '" alt="Image" width="50" height="50">';
                            } else {
                                return data; // Return the raw data for other types
                            }
                        }
                    },
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false}
            ]
        });
    });
</script>

@endsection
<!-- ========== table components end ========== -->