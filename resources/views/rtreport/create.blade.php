@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form method="POST" enctype="application/x-www-form-urlencoded" action="/rtreport">
        @csrf
        <h4>Create RT Report</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="submit" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-secondary">Back</button>
            </div>

        </div>
        <br />
        <div class="card">
            <div class="card-header">Customer Details</div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Name</label>
                        <select  name="owner_name" class="form-control form-control-sm select" dropdown="owners"></select>
                        @error('owner_name')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                        {{-- <small class="form-text text-muted">select owner</small> --}}
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Address</label>
                     <input name="owner_address" type="text" value="{{old('owner_address')}}" class="form-control form-control-sm autocomplete" dropdown="addresses">
                        @error('owner_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Client Name</label>
                        <input name="client_name" value="{{old('client_name')}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="clients">
                        @error('client_name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Client Address</label>
                        <select name="client_address" value="{{old('client_address')}}" type="text" class="form-control form-control-sm select" dropdown="5"></select>
                        @error('client_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <small class="form-text text-muted">intellisense</small>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Name</label>
                        <input name="project_name" value="{{old('project_name')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('project_name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Address</label>
                        <input name="project_address" value="{{old('project_address')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('project_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Requested By</label>
                        <input name="requested_by" value="{{old('requested_by')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('requested_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Request No</label>
                        <input name="request_no" value="{{old('request_no')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('request_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>P.O No.</label>
                        <input name="po_tranno"  value="{{old('po_tranno')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('po_tranno')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3  inner-addon right-addon">
                        <label>W.O. No./Job No.</label>
                        <i class="fa fa-plus"></i>
                        <input name="wo_tranno" value="{{old('wo_tranno')}}" type="text" class="form-control form-control-sm autocomplete" dropdown="3" placeholder="">
                        <small  class="form-text text-muted">intellisense available.</small>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">System Details</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Procedure No.</label>
                        <input name="procedure_no" value="{{old('procedure_no')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('procedure_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Reference Code</label>
                        <input name="reference_code" value="{{old('reference_code')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('reference_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Acceptance Criteria</label>
                        <input name="acceptance_criteria" value="{{old('acceptance_criteria')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('acceptance_criteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Specification</label>
                        <input name="project_spec"  value="{{old('project_spec')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('project_spec')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Material</label>
                        <input name="material"   value="{{old('material')}}"   type="text" class="form-control form-control-sm" placeholder="">
                        @error('material')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Grade</label>
                        <input name="grade"   value="{{old('grade')}}"    type="text" class="form-control form-control-sm" placeholder="">
                        @error('grade')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Condition</label>
                        <input name="surface_condition" value="{{old('surface_condition')}}"   type="text" class="form-control form-control-sm" placeholder="">
                        @error('surface_condition')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Temperature</label>
                        <input name="surface_temperature" value="{{old('surface_temperature')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('surface_temperature')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Drawing No.</label>
                        <input  name="drawing_no" value="{{old('drawing_no')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('drawing_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Line No.</label>
                        <input  name="line_no"  value="{{old('line_no')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('line_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Process</label>
                        <input name="weld_process"  value="{{old('weld_process')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('weld_process')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Reinforcement</label>
                        <input  name="weld_reinforcement"  value="{{old('weld_reinforcement')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('weld_reinforcement')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">Method Details</div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>X Ray Voltage/Source</label>
                        <input  name="xray_volt_src" value="{{old('xray_volt_src')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('xray_volt_src')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Source/Focal Spot Size</label>
                        <input name="src_spot_size"  value="{{old('src_spot_size')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('src_spot_size')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Flim Manufacturer</label>
                        <input name="flim_manufacturer"   value="{{old('flim_manufacturer')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('flim_manufacturer')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Flim Type</label>
                        <input  name="flim_type"   value="{{old('flim_type')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('flim_type')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Flim in Cassette</label>
                        <input name="flim_in_cassette"  value="{{old('flim_in_cassette')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('flim_in_cassette')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Technique</label>
                        <input name="technique"  value="{{old('technique')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('technique')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>SOD</label>
                        <input name="sod"  value="{{old('sod')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        <small  class="form-text text-muted">Source To Object Distance.</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>OFD</label>
                        <input name="ofd"   value="{{old('ofd')}}"   type="text" class="form-control form-control-sm" placeholder="">
                        <small  class="form-text text-muted">Object To Film Distance.</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>IQI</label>
                        <input name="iqi"   value="{{old('iqi')}}" type="text" class="form-control form-control-sm" placeholder="">
                        @error('iqi')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Sensitivity</label>
                        <input name="sensitivity" value="{{old('sensitivity')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('sensitivity')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Ug</label>
                        <input  name="ug"  value="{{old('ug')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('ug')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Lead Screen Thickness</label>
                        <input name="lead_scr_thickness"   value="{{old('lead_scr_thickness')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('lead_scr_thickness')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Configuration</label>
                        <input name="configuration"   value="{{old('configuration')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('configuration')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Welder ID</label>
                        <input name="welder_id"   value="{{old('welder_id')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('welder_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Technician 1</label>
                        <input name="technician_1"   value="{{old('technician_1')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('technician_1')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Technician 2</label>
                        <input name="technician_2"   value="{{old('technician_2')}}"  type="text" class="form-control form-control-sm" placeholder="">
                        @error('technician_2')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <br />

        <div class="card">
            <div class="card-header">Interpretation Details</div>

            <div class="card-body card-table">

                <table sublist-attr="interpretations" class="table table-sm table-bordered">
                    <thead class="text-center">

                        <tr>
                            <th rowspan="2">SNo.</th>
                            <th rowspan="2">Joint No.</th>
                            <th rowspan="2">Size</th>
                            <th colspan="2">Thick(mm)</th>
                            <th rowspan="2">Section</th>
                            <th colspan="2">Wire</th>
                            <th rowspan="2">Density</th>
                            <th colspan="2">Interpretation</th>
                            <th rowspan="2">Result</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Parent</th>
                            <th>Weld</th>
                            <th>Req</th>
                            <th>Vis</th>
                            <th>Discontinuity</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input name-attr="joint_no" class="form-control form-control-sm" /></td>
                            <td><input name-attr="size" class="form-control form-control-sm autocomplete" dropdown="3" /></td>
                            <td><input name-attr="parent" class="form-control form-control-sm" /></td>
                            <td><input name-attr="weld" class="form-control form-control-sm" /></td>
                            <td><input name-attr="section" class="form-control form-control-sm autocomplete" dropdown="3" /></td>
                            <td><input name-attr="wire_req" class="form-control form-control-sm" /></td>
                            <td><input name-attr="wire_vis" class="form-control form-control-sm" /></td>
                            <td><input name-attr="density" class="form-control form-control-sm" /></td>
                            <td><input name-attr="discontinuity" class="form-control form-control-sm" /></td>
                            <td><input name-attr="size" class="form-control form-control-sm" /></td>
                            <td><input name-attr="result" class="form-control form-control-sm" /></td>
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
                            <td colspan="10">&nbsp;</td>
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
        enableAutoComplete();
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

    $(document).on('click','.delrow',function(e){
        e.preventDefault();
        $(this).parents('tr').remove();
        updateIndex();
    })

    var cache = {};

    function enableAutoComplete() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("tbody tr:last input.autocomplete").autocomplete({
            minLength: 0,
            source: function(request, response) {
                var _this = this;
                var dropdown_id = _this.element.attr("dropdown")
                // Fetch data
                $.ajax({
                    url: "/picklist/search",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        q: request.term,
                        id: dropdown_id
                    },
                    success: function(data) {
                        var term = request.term;
                        term = dropdown_id + "_" + term;
                        if (term in cache) {
                            response(cache[term]);
                            return;
                        }
                        response(data);
                    }
                });
            }
        });
    }

    function updateIndex()
    {
        $("tbody tr").each(function(i,el){
            var row = $(el);
            row.find(".form-control").each(function(i2,col){
               var prev =  $(col).attr("name");
                $(col).attr("name",prev.replace(/\d+/g,i));
            })
        })
    }
</script>
@endsection
