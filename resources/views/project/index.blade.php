@extends('layouts.datatable')
@section('content')
        <div class="card">
          <div class="card-header">
             <div class="col-md-12">
                 <h4 class="card-title">RT Report
                   <a class="btn btn-success ml-5" href="/rtreport/create" id="createNewItem"> New RT Report</a>
                 </h4>
             </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered data-table">
                 <thead>
                     <tr>
                         <th width="5%">No</th>
                         <th>Name</th>
                         <th>Client</th>
                         <th width="15%">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                 </tbody>
             </table>
         </div>
         <div class="modal fade" id="ajaxModel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title" id="modelHeading"></h4>
                     </div>
                     <div class="modal-body">
                         <form id="ItemForm" name="ItemForm" class="form-horizontal">
                            <input type="hidden" name="Item_id" id="Item_id">
                             <div class="form-group">
                                 <label for="name" class="col-sm-2 control-label">Name</label>
                                 <div class="col-sm-12">
                                     <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">descriptions</label>
                                 <div class="col-sm-12">
                                     <textarea id="description" name="description" required="" placeholder="Enter descriptions" class="form-control"></textarea>
                                 </div>
                             </div>
                             <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                              </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
          </div>
        </div>

@section('table')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
        ajax: "{{ route('loaddata.get') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>
@endsection
