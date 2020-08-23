@extends('layouts.app')
@section('content')
<div class="container-fluid">
<form method="POST" enctype="multipart/form-data" action="{{route("utgtreport.update",$record->id)}}">
        @csrf
        @method("PUT")
        <h4>Edit UltraSonic Thickness Gauge Test UTGT Report</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Save changes</button>
                <input type="reset" class="btn btn-warning" value="Reset"/>
                <a href="{{route("utgtreport.index")}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">Customer Details</div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Name</label>
                    <select  name="owner" value="{{$record->owner}}" class="form-control form-control-sm select address" record="owners"></select>
                        @error('owner')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                        {{-- <small class="form-text text-muted">select owner</small> --}}
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Address</label>
                     <textarea name="owner_address" rows="5" class="form-control form-control-sm">{{$record->owner_address}}
                     </textarea>
                        @error('owner_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Client Name</label>
                        <select name="client" value="{{$record->client}}"  class="form-control form-control-sm select address" record="clients"></select>
                        @error('client')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Client Address</label>
                        <textarea name="client_address"  rows="5"  class="form-control form-control-sm">{{$record->client_address}}
                        </textarea>
                        @error('client_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <small class="form-text text-muted">intellisense</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Name</label>
                        <select name="project" value="{{$record->project}}"  class="form-control form-control-sm select address"  record="projects"></select>
                        @error('project')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Address</label>
                        <textarea name="project_address"  rows="5" class="form-control form-control-sm">{{$record->project_address}}
                        </textarea>
                        @error('project_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Requested By</label>
                        <select name="requested_by" value="{{$record->requested_by}}" class="form-control form-control-sm select" record="employees"></select>
                        @error('requested_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Request No</label>
                        <input name="request_no" value="{{$record->request_no}}"   type="text" class="form-control form-control-sm">
                        @error('request_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>P.O No.</label>
                        <input name="po_tranno"  value="{{$record->po_tranno}}"  type="text" class="form-control form-control-sm">
                        @error('po_tranno')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3  inner-addon right-addon">
                        <label>W.O. No./Job No.</label>
                        <i class="fa fa-plus"></i>
                        <input name="wo_tranno" value="{{$record->wo_tranno}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="3">
                        @error('wo_tranno')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
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
                        <input name="procedure_no" value="{{$record->procedure_no}}" type="text" class="form-control form-control-sm autocomplete" dropdown="Procedure No" >
                        @error('procedure_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Reference Code</label>
                        <input name="reference_code" value="{{$record->reference_code}}" type="text" class="form-control form-control-sm autocomplete" dropdown="Reference Code">
                        @error('reference_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Acceptance Criteria</label>
                        <input name="acceptance_criteria" value="{{$record->acceptance_criteria}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="Acceptance Criteria">
                        @error('acceptance_criteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Specification</label>
                        <input name="project_spec" value="{{$record->project_spec}}" type="text" class="form-control form-control-sm">
                        @error('project_spec')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Material</label>

                        <input name="material"   value="{{$record->material}}"   type="text" class="form-control form-control-sm autocomplete" dropdown="Material">
                        @error('material')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Grade</label>
                        <input name="grade"   value="{{$record->grade}}"    type="text" class="form-control form-control-sm autocomplete" dropdown="Grade">
                        @error('grade')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Condition</label>
                        <input name="surface_condition" value="{{$record->surface_condition}}"   type="text" class="form-control form-control-sm autocomplete" dropdown="Surface Condition">
                        @error('surface_condition')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Temperature</label>
                        <input name="surface_temperature" value="{{$record->surface_temperature}}" type="text" class="form-control form-control-sm autocomplete" dropdown="Surface Temperature">
                        @error('surface_temperature')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Drawing No.</label>
                        <input name="drawing_no"  value="{{$record->drawing_no}}"
                        type="text" class="form-control form-control-sm autocomplete" dropdown="drawing_no">
                        @error('drawing_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Line No.</label>
                        <input  name="line_no"  value="{{$record->line_no}}" type="text"
                        class="form-control form-control-sm autocomplete" dropdown="line_no">
                        @error('line_no')
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
                        <label>UTG Equipment</label>
                        <input  name="ut_equipment" value="{{$record->ut_equipment}}"  type="text"
                        class="form-control form-control-sm autocomplete" dropdown='utg_equipment'>
                        @error('ut_equipment')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>UTG Equipment Sr.No. </label>
                        <input name="ut_equipment_sr_no"   value="{{$record->ut_equipment_sr_no}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="ut_equipment_sr_no">
                        @error('ut_equipment_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Probe Type</label>
                        <input name="probe_type"    value="{{$record->probe_type}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="probe_type">
                        @error('probe_type')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Probe Angle</label>
                        <input  name="probe_angle"    value="{{$record->probe_angle}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="probe_angle">
                        @error('probe_angle')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Probe Frequency</label>
                        <input name="probe_frequency"  value="{{$record->probe_frequency}}"
                          type="text" class="form-control form-control-sm autocomplete" dropdown="probe_frequency">
                        @error('probe_frequency')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Probe Size</label>
                        <input name="probe_size"   value="{{$record->probe_size}}" type="text"
                        class="form-control form-control-sm autocomplete" dropdown="probe_size">
                        @error('probe_size')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Probe Sr.No.</label>
                        <input name="probe_sr_no"   value="{{$record->probe_sr_no}}"  type="text"
                         class="form-control form-control-sm autocomplete" dropdown="probe_sr_no">
                        <small  class="form-text text-muted">intellisense available.</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Stop Wedge Sr.No.</label>
                        <input name="stop_wedge_sr_no"   value="{{$record->stop_wedge_sr_no}}"   type="text"
                        class="form-control form-control-sm" dropdown="stop_wedge_sr_no">
                        <small  class="form-text text-muted">intellisense available.</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Couplant</label>
                        <input name="couplant"  value="{{$record->couplant}}" type="text"
                        class="form-control form-control-sm autocomplete" dropdown="couplant">
                        @error('couplant')
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
                            <th rowspan="2">Equipment</th>
                            <th rowspan="2">Location</th>
                            <th rowspan="2">Base Line.<br/>Reading(mm)</th>
                            <th colspan="9">Remaining Thickness(mm)</th>
                            <th rowspan="2">Length/Thick</th>
                            <th rowspan="2">Corrosion<br/>Allowance(mm)</th>
                            <th rowspan="2">Result</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>Minimum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($record->interpretations as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><input name="interpretations[{{$loop->index}}][equipment]"    value="{{$item->equipment}}"       class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][location]"     value="{{$item->location}}"       class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][base_line_reading]" value="{{$item->base_line_reading}}"  class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_1]"  value="{{$item->rem_thick_1}}"       class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_2]"  value="{{$item->rem_thick_2}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_3]"  value="{{$item->rem_thick_3}}"       class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_4]"  value="{{$item->rem_thick_4}}"       class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_5]"  value="{{$item->rem_thick_5}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_6]"  value="{{$item->rem_thick_6}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_7]"  value="{{$item->rem_thick_7}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][rem_thick_8]"  value="{{$item->rem_thick_8}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][minimum]"      value="{{$item->minimum}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][length]"       value="{{$item->length}}"      class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][corr_allowence]" value="{{$item->corr_allowence}}"    class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][result]"      value="{{$item->result}}"       class="form-control form-control-sm" /></td>
                            <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input name-attr="equipment" class="form-control form-control-sm" /></td>
                            <td><input name-attr="location" class="form-control form-control-sm" /></td>
                            <td><input name-attr="base_line_reading" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_1" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_2" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_3" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_4" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_5" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_6" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_7" class="form-control form-control-sm" /></td>
                            <td><input name-attr="rem_thick_8" class="form-control form-control-sm" /></td>
                            <td><input name-attr="minimum" class="form-control form-control-sm" /></td>
                            <td><input name-attr="length" class="form-control form-control-sm" /></td>
                            <td><input name-attr="corr_allowence" class="form-control form-control-sm" /></td>
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
                            <td colspan="14">&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                    <label>Remarks/Restricted Areas(if any).</label>
                    <input name="remarks" value="{{$record->inspected_by}}" type="text"
                        class="form-control form-control-sm">
                    @error('remarks')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <br/>
        <br/>
        <div class="card">
            <div class="card-header">
                Photo Details
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <img src="/storage/{{$record->photo_1}}" width="100%">
                        <label>Change Photo 1</label>
                        <input id='photo_1' name="photo_1" type="file"  class="form-control-file">
                        <small class="form-text text-muted">selected image will be replaced for existing one</small>
                        @error('photo_1')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <img src="/storage/{{$record->photo_2}}" width="100%">
                        <label>Change Photo 2</label>
                        <input id='photo_2' name="photo_2" type="file" class="form-control-file">
                        <small class="form-text text-muted">selected image will be replaced for existing one</small>
                        @error('photo_2')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <img src="/storage/{{$record->drawing}}" width="100%">
                        <label>Change Drawing</label>
                        <input id='drawing' name="drawing" type="file" class="form-control-file">
                        <small class="form-text text-muted">selected image will be replaced for existing one</small>
                        @error('drawing')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <br/>
        <div class="card">
            <div class="card-header">
                Authority Details
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Inspected By</label>
                        <select name="inspected_by" value="{{$record->inspected_by}}" class="form-control form-control-sm select" record="employees" ></select>
                        @error('inspected_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Authorised By</label>
                        <select name="authorised_by" value="{{$record->authorised_by}}" class="form-control form-control-sm select" record="employees" ></select>
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
