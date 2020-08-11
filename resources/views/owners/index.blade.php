@extends('layouts.app')
@section('content')
        <div class="card">
          <div class="card-header">
             <div class="col-md-12">
                 <h4 class="card-title">Owners
                   <a class="btn btn-success ml-5" href="/owners/create" id="createNewItem"> New Owner</a>
                 </h4>
             </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-sm data-table">
                 <thead>
                     <tr>
                         <th width="5%">No</th>
                         <th>Name</th>
                         <th>email</th>
                         <th>phone</th>
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
        ajax: "{{ route('owners.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'created_at', name: 'created_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "columnDefs": [{
                "targets": 1,
                "render":function(s,c,row)
                {
                    return `<a href="owners/${row["id"]}">${row["name"]}</a>`
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
            url: `${$("#rooturl").val()}/owners/${data.id}`,
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

