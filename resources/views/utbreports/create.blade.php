@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form method="POST" enctype="multipart/form-data" action="{{route("utbreport.store")}}">
        @csrf
        <h4>Create UTB (AWS) Report</h4>
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
                        <select  name="owner" class="form-control form-control-sm select address" record="owners"></select>
                        @error('owner')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                        {{-- <small class="form-text text-muted">select owner</small> --}}
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Address</label>
                     <textarea name="owner_address" rows="5"  value="{{old('owner_address')}}" class="form-control form-control-sm"></textarea>
                        @error('owner_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Client Name</label>
                        <select name="client"  class="form-control form-control-sm select address" record="clients"></select>
                        @error('client')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Client Address</label>
                        <textarea name="client_address"  rows="5"    value="{{old('client_address')}}" class="form-control form-control-sm"></textarea>
                        @error('client_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <small class="form-text text-muted">intellisense</small>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Name</label>
                        <select name="project"  class="form-control form-control-sm select address"  record="projects"></select>
                        @error('project')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Address</label>
                        <textarea name="project_address"  rows="5"    value="{{old('project_address')}}" class="form-control form-control-sm"></textarea>
                        @error('project_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Requested By</label>
                        <select name="requested_by"  class="form-control form-control-sm select" record="employees"></select>
                        @error('requested_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Request No</label>
                        <input name="request_no" value="{{old('request_no')}}"  type="text" class="form-control form-control-sm">
                        @error('request_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>P.O No.</label>
                        <input name="po_tranno"  value="{{old('po_tranno')}}" type="text" class="form-control form-control-sm">
                        @error('po_tranno')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3  inner-addon right-addon">
                        <label>W.O. No./Job No.</label>
                        <i class="fa fa-plus"></i>
                        <input name="wo_tranno" value="{{old('wo_tranno')}}" type="text" class="form-control form-control-sm autocomplete" dropdown="3">
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
                        <input name="procedure_no" value="{{old('procedure_no')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Procedure No">
                        @error('procedure_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Reference Code</label>
                        <input name="reference_code" value="{{old('reference_code')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Reference Code">
                        @error('reference_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Acceptance Criteria</label>
                        <input name="acceptance_criteria" value="{{old('acceptance_criteria')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Acceptance Criteria">
                        @error('acceptance_criteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Specification</label>
                        <input name="project_spec" value="{{old('project_spec')}}" type="text"
                            class="form-control form-control-sm">
                        @error('project_spec')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Material</label>

                        <input name="material" value="{{old('material')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Material">
                        @error('material')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Grade</label>
                        <input name="grade" value="{{old('grade')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Grade">
                        @error('grade')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Condition</label>
                        <input name="surface_condition" value="{{old('surface_condition')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Surface Condition">
                        @error('surface_condition')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Temperature</label>
                        <input name="surface_temperature" value="{{old('surface_temperature')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Surface Temperature">
                        @error('surface_temperature')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Process</label>
                        <input name="weld_process" value="{{old('weld_process')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Weld Process">
                        @error('weld_process')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Preparation</label>
                        <input name="weld_preparation" value="{{old('weld_preparation')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="weld_preparation">
                        @error('weld_preparation')
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
                        <label>UT Equipment</label>
                        <input name="ut_equipment" value="{{old('ut_equipment')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown='ut_equipment'>
                        @error('ut_equipment')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>UT Equipment Sr.No. </label>
                        <input name="ut_equipment_sr_no" value="{{old('ut_equipment_sr_no')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="ut_equipment_sr_no">
                        @error('ut_equipment_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Type of Scan</label>
                        <input name="type_of_scan" value="{{old('type_of_scan')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="type_of_scan">
                        @error('type_of_scan')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Method of Test</label>
                        <input name="method_of_test" value="{{old('method_of_test')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="method_of_test">
                        @error('method_of_test')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cable Type</label>
                        <input name="cable_type" value="{{old('cable_type')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="cable_type">
                        @error('cable_type')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cable Length</label>
                        <input name="cable_length" value="{{old('cable_length')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="cable_length">
                        @error('cable_length')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>V1 Block Sr.No</label>
                        <input name="v1_block_sr_no" value="{{old('v1_block_sr_no')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="v1_block_sr_no">
                        @error('v1_block_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>V2 Block Sr.No</label>
                        <input name="v2_block_sr_no" value="{{old('v2_block_sr_no')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="v2_block_sr_no">
                        @error('v2_block_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cal. Block Sr.No</label>
                        <input name="cal_block_sr_no" value="{{old('cal_block_sr_no')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="cal_block_sr_no">
                        @error('cal_block_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Couplant</label>
                        <input name="couplant" value="{{old('couplant')}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="couplant">
                        @error('couplant')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Thickness</label>
                        <input name="thickness" value="{{old('thickness')}}" type="text"
                            class="form-control form-control-sm">
                        @error('thickness')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Weld Joint No.</label>
                        <input name="weld_joint_no" value="{{old('weld_joint_no')}}" type="text"
                            class="form-control form-control-sm">
                        @error('weld_joint_no')
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
                            <th class="text-vertical" rowspan="3">Indication No.</th>
                            <th class="text-vertical" rowspan="3">Probe Sr.No</th>
                            <th class="text-vertical" rowspan="3">Probe Size(mm)</th>
                            <th class="text-vertical" rowspan="3">Frequency(MHz)</th>
                            <th class="text-vertical" rowspan="3">Transducer Angle(deg)</th>
                            <th class="text-vertical" rowspan="3">From Face</th>
                            <th class="text-vertical" rowspan="3">Leg</th>

                            <th colspan="4">Decibels</th>
                            <th colspan="5">Discontinuity</th>

                            <th rowspan="3" class="text-vertical">Discontinuity</th>
                            <th rowspan="3" class="text-vertical">Result</th>
                            <th rowspan="3">Action</th>

                        </tr>
                        <tr>
                            <th class="text-vertical">Indication <br />Level(dB) </th>
                            <th class="text-vertical">Reference <br />Level(dB) </th>
                            <th class="text-vertical">Attenuation <br />Factor </th>
                            <th class="text-vertical">Indication <br />Ratio </th>
                            <th rowspan="2" class="text-vertical">Length(mm)</td>
                            <th rowspan="2" class="text-vertical">Angular Distance<br>(sound path)</th>
                            <th rowspan="2" class="text-vertical">Depth from A <br>surface(mm)</th>
                            <th colspan="2">Distance(mm)</th>

                        </tr>
                        <tr>
                            <th>a</th>
                            <th>b</th>
                            <th>c</th>
                            <th>d</th>
                            <th>From <br>x</th>
                            <th>From <br>y</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>

                            <td><input name-attr="probe_sr_no" class="form-control form-control-sm autocomplete"
                                    dropdown='probe_sr_no' /></td>

                            <td><input name-attr="probe_size" class="form-control form-control-sm autocomplete"
                                    dropdown='probe_size' /></td>

                            <td><input name-attr="frequency" class="form-control form-control-sm autocomplete"
                                    dropdown='frequency' /></td>

                            <td><input name-attr="transducer_angle" class="form-control form-control-sm autocomplete"
                                    dropdown='transducer_angle' /></td>

                            <td><input name-attr="from_face" class="form-control form-control-sm autocomplete"
                                    dropdown='from_face' /></td>

                            <td><input name-attr="leg" class="form-control form-control-sm autocomplete"
                                    dropdown='leg' /></td>

                            <td><input name-attr="indication_level_a" class="form-control form-control-sm" /></td>

                            <td><input name-attr="reference_level_b" class="form-control form-control-sm" /></td>

                            <td><input name-attr="attenuation_factor_c" class="form-control form-control-sm autocomplete"
                                    dropdown='attenuation_factor_c' /></td>

                            <td><input name-attr="indication_ratio_d" class="form-control form-control-sm autocomplete"
                                    dropdown='indication_ratio_d' /></td>

                            <td><input name-attr="length" class="form-control form-control-sm" /></td>


                            <td><input name-attr="angular_distance" class="form-control form-control-sm" /></td>


                            <td><input name-attr="depth_from_surface" class="form-control form-control-sm" /></td>


                            <td><input name-attr="distance_from_x" class="form-control form-control-sm" /></td>


                            <td><input name-attr="distance_from_y" class="form-control form-control-sm" /></td>

                            <td><input name-attr="discontinuity" class="form-control form-control-sm autocomplete"
                                dropdown='discontinuity' /></td>

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
                            <td colspan="16">&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                    <label>Calibration Remarks/Restricted Areas(if any).</label>
                    <input name="calibration_remarks" value="{{old('calibration_remarks')}}" type="text"
                        class="form-control form-control-sm">
                    @error('calibration_remarks')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <br />
        <div class="card">
            <div class="card-header">
                Photo Details
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Photo 1</label>
                        <input id='photo_1' name="photo_1" type="file" class="form-control-file">
                        @error('photo_1')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Photo 2</label>
                        <input id='photo_2' name="photo_2" type="file" class="form-control-file">
                        @error('photo_2')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Drawing</label>
                        <input id='drawing' name="drawing" type="file" class="form-control-file">
                        @error('drawing')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <br />
        <div class="card">
            <div class="card-header">
                Authority Details
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Inspected By</label>
                        {{-- <input  name="inspected_by" value="{{old('inspected_by')}}" type="text" class="form-control
                        form-control-sm"> --}}
                        <select name="inspected_by" class="form-control form-control-sm select"
                            record="employees"></select>
                        @error('inspected_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Authorised By</label>
                        <select name="authorised_by" class="form-control form-control-sm select"
                            record="employees"></select>
                        {{-- <input  name="authorised_by" value="{{old('authorised_by')}}" type="text"
                        class="form-control form-control-sm"> --}}
                        @error('authorised_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
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
    $(".add-btn").click(function (e) {
        e.preventDefault();
        var sublist = $(this).parents("table").attr("sublist-attr");
        var td = "";
        $("tfoot tr").eq(0).find('.form-control').each(function (i, el) {
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
                    <td><span>${$("tbody tr").length + 1}</span></td>
                    ${td}
                    <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                </tr>`
        $("tbody").append(tr);
        enableAutoComplete();
    });

    $(".can-btn").click(function (e) {
        e.preventDefault();
    });

    $(document).on('click', 'tbody td', function (e) {
        $(this).find('input').removeAttr("readonly");
    })

    $(document).on('blur', 'tbody td', function (e) {
        $(this).find('input').attr("readonly", "readonly");
    })

    $(document).on('click', '.delrow', function (e) {
        e.preventDefault();
        $(this).parents('tr').remove();
        updateIndex();
    })

    var cache = {};

    function enableAutoComplete() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("tbody tr:last input.autocomplete").autocomplete({
            minLength: 0,
            source: function (request, response) {
                var _this = this;
                var term = request.term;
                term = dropdown_id + "_" + term;
                if (term in cache) {
                    response(cache[term]);
                    return;
                }
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
                    success: function (data) {
                        response(data);
                    }
                });
            }
        });
    }

    function updateIndex() {
        $("tbody tr").each(function (i, el) {
            var row = $(el);
            row.find(".form-control").each(function (i2, col) {
                var prev = $(col).attr("name");
                $(col).attr("name", prev.replace(/\d+/g, i));
            })
        })
    }
</script>
@endsection
