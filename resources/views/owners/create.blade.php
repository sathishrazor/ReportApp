@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form method="POST" enctype="application/x-www-form-urlencoded" action="{{route('owners.store')}}">
        @csrf
        <h4>Create Owner</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="submit" class="btn btn-warning">Reset</button>
                <a href="{{route('owners.index')}}" class="btn btn-secondary">Back to List</a>
            </div>

        </div>
        <br />
        <div class="card">
            <div class="card-header">Primary Details</div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Name</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control form-control-sm">
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Ref No</label>
                        <input name="entity_id"  value="{{ old('entity_id') }}" type="text" class="form-control form-control-sm">
                        @error('client_name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Email</label>
                        <input name="email"  value="{{ old('email') }}" type="email" class="form-control form-control-sm">
                        @error('client_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Phone</label>
                        <input name="phone"  value="{{ old('phone') }}" type="text" class="form-control form-control-sm">
                        @error('phone')
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
