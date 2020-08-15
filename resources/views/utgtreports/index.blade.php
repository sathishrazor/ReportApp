@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="col-md-12">
            <h4 class="card-title"><span id="page_name">ULTRASONIC THICKNESS GAUGE TEST Report</span>
            <a class="btn btn-success ml-5" href="{{route("utgtreport.create")}}" id="createNewItem"> New UTGTReport</a>
            </h4>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Report No</th>
                    <th>Created by</th>
                    <th>Created On</th>
                    <th>PO No</th>
                    <th>WO No</th>
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
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('utgtreport.datatable') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'reference_code',
                    name: 'reference_code'
                },
                {
                    data: 'created_by',
                    name: 'created_by'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },


                {
                    data: 'po_tranno',
                    name: 'po_tranno'
                },
                {
                    data: 'wo_tranno',
                    name: 'wo_tranno'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "columnDefs": [{
                "targets": 1,
                "render":function(s,c,row)
                {
                    return `<a href="/utgtreport/${row["id"]}">UTGT_NO_${row["id"]}</a>`
                }
            }]
        });

    });
</script>
@endsection
