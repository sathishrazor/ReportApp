@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form method="POST" enctype="application/x-www-form-urlencoded" action="{{route('projects.store')}}">
        @csrf
        <h4>Create New Project</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="submit" class="btn btn-warning">Reset</button>
                <a href="{{route('projects.index')}}" class="btn btn-secondary">Back to List</a>
            </div>

        </div>
        <br />
        <div class="card">
            <div class="card-header">Primary Details</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Name</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control form-control-sm">
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project ID</label>
                        <input name="entity_id"  value="{{ old('entity_id') }}" type="text" class="form-control form-control-sm">
                        @error('entity_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Manager</label>
                        <input name="manager"  value="{{ old('manager') }}" type="text" class="form-control form-control-sm">
                        @error('manager')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Start Date</label>
                        <input name="start_date"  value="{{ old('start_date') }}" type="date" class="form-control form-control-sm">
                        @error('start_date')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>End Date</label>
                        <input name="end_date"  value="{{ old('end_date') }}" type="date" class="form-control form-control-sm">
                        @error('end_date')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="card">
            <div class="card-header">AddressBook</div>

            <div class="card-body card-table">
                @error('addressbook')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                <table sublist-attr="addressbook" class="table table-sm table-bordered">
                    <thead class="text-center">

                        <tr>
                            <th>Sno</th>
                            <th>Attention</th>
                            <th>Address L1</th>
                            <th>Address L2</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Zip</th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input name-attr="attention" class="form-control form-control-sm" /></td>
                            <td><input name-attr="addr1" class="form-control form-control-sm" /></td>
                            <td><input name-attr="addr2" class="form-control form-control-sm" /></td>
                            <td><input name-attr="city" class="form-control form-control-sm" /></td>
                            <td><input name-attr="state" class="form-control form-control-sm" /></td>
                            <td><input name-attr="country" class="form-control form-control-sm" /></td>
                            <td><input name-attr="zip" class="form-control form-control-sm" /></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="btn btn-group">
                                    <button class="add-btn btn btn-primary btn-sm">Add</button>
                                    <button class="can-btn btn btn-secondary btn-sm">Cancel</button>
                                </div>
                            </td>
                            <td></td>
                            <td colspan="7">&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .ui-autocomplete-loading {
        background: white url("/img/ui-anim_basic_16x16.gif") right center no-repeat;
    }
</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/form_auto_complete.js')}}"></script>
<script>
    $(".add-btn").click(function(e) {
        e.preventDefault();
        var sublist = $(this).parents("table").attr("sublist-attr");
        var td = "";
        $("tfoot tr").eq(0).find('.form-control').each(function(i, el) {
            var $el = $(el);
            var auto_cmp = "";
            var dropdown = "";
            if ($el.hasClass("autocomplete")) {
                auto_cmp = "autocomplete"
                dropdown = $el.attr("dropdown");
            }
            var name = `${sublist}[${$("tbody tr").length}][${$el.attr("name-attr")}]`;
            td += `<td><input type="text"
                        class="form-control form-control-sm ${auto_cmp}"
                        dropdown="${dropdown}"
                        name="${name}" readonly="readonly"
                        value="${$el.val()}"/></td>`
        });
        var tr = `<tr>
                    <td><span>${$("tbody tr").length+1}</span></td>
                    ${td}
                    <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                </tr>`
        $("tbody").append(tr);
        //enableAutoComplete();
    });

    $(".can-btn").click(function(e) {
        e.preventDefault();
    });

    $(document).on('click', 'tbody td', function(e) {
        $(this).find('input').removeAttr("readonly");
    })

    $(document).on('blur', 'tbody td', function(e) {
        $(this).find('input').attr("readonly", "readonly");
    })

    $(document).on('click', '.delrow', function(e) {
        e.preventDefault();
        $(this).parents('tr').remove();
        updateIndex();
    })

    var cache = {};

    function updateIndex() {
        $("tbody tr").each(function(i, el) {
            var row = $(el);
            row.find(".form-control").each(function(i2, col) {
                var prev = $(col).attr("name");
                $(col).attr("name", prev.replace(/\d+/g, i));
            })
        })
    }
</script>
@endsection
