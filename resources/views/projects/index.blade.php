@extends('layouts.app')
@section('content')
        <div class="card">
          <div class="card-header">
             <div class="col-md-12">
                 <h4 class="card-title">projects
                 <a class="btn btn-success ml-5" href="{{route('projects.create')}}" id="createNewItem"> New Project</a>
                 </h4>
             </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-sm data-table">
                 <thead>
                     <tr>
                         <th width="5%">No</th>
                         <th>Project Name</th>

                         <th>manager</th>
                         <th>created_at</th>
                         <th>created_by</th>
                         <th width="15%">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                 </tbody>
             </table>
         </div>

        </div>

@section('table')
<link href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection
<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('projects.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'manager', name: 'phone'},
            {data: 'created_at', name: 'created_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "columnDefs": [{
                "targets": 1,
                "render":function(s,c,row)
                {
                    return `<a href="projects/${row["id"]}">${row["name"]}</a>`
                }
            }]
    });



    $(document).on('click','.deleteItem',function(ev){
      var data = table.row($(this).parents('tr')).data()
        console.log(data);
        var answer = confirm("Are you sure want to continue?");
        if(answer)
        {
            $.ajax({
            url: `${$("#rooturl").val()}/clients/${data.id}`,
            type: 'DELETE',
            success: function(result) {
                // Do something with the result
                console.log("deleteres",result);
                $('.data-table').DataTable().ajax.reload();
            }
        });
        }

    })

  });
</script>
@endsection

