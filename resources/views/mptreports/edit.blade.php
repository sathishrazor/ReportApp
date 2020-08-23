@extends('layouts.app')
@section('content')
<div class="container-fluid">
<form method="POST" enctype="multipart/form-data"action="{{route("mptreport.update",$record->id)}}">
        @csrf
        @method("PUT")
        <h4>Edit MPT Report</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <input type="reset" class="btn btn-warning" value="Reset"/>
                <button type="submit" class="btn btn-secondary">Back</button>
            </div>
        </div>
        <br/>
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
                        <input name="reference_code" value="{{$record->reference_code}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="Reference Code">
                        @error('reference_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Acceptance Criteria</label>
                        <input name="acceptance_criteria"value="{{$record->acceptance_criteria}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="Acceptance Criteria">
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

                        <input name="material"  value="{{$record->material}}"   type="text" class="form-control form-control-sm autocomplete" dropdown="Material">
                        @error('material')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Grade</label>
                        <input name="grade"  value="{{$record->grade}}"    type="text" class="form-control form-control-sm autocomplete" dropdown="Grade">
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
                        <input name="surface_temperature" value="{{$record->surface_temperature}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="Surface Temperature">
                        @error('surface_temperature')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Process</label>
                        <input name="weld_process"  value="{{$record->weld_process}}"   type="text" class="form-control form-control-sm autocomplete" dropdown="Weld Process">
                        @error('weld_process')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Reinforcement</label>
                        <input  name="weld_reinforcement" value="{{$record->weld_reinforcement}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="Weld Reinforcement">
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
                        <label>Type of Equipment</label>
                        <input  name="type_of_equipment"  value="{{$record->type_of_equipment}}"   type="text"
                        class="form-control form-control-sm autocomplete" dropdown='X-Ray Voltage/ Source'>
                        @error('type_of_equipment')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Type of Current </label>
                        <input name="type_of_current"  value="{{$record->type_of_current}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="X-Ray / Source">
                        @error('type_of_current')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Chemical Manufacturer</label>
                        <input name="chemical_manufacture"   value="{{$record->chemical_manufacture}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="Fim Manufacturer">
                        @error('chemical_manufacture')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cleaner Batch No</label>
                        <input  name="cleaner_batch_no"   value="{{$record->cleaner_batch_no}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="Film Type">
                        @error('cleaner_batch_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Contrast Batch No</label>
                        <input name="contrast_batch_no" value="{{$record->contrast_batch_no}}"
                          type="text" class="form-control form-control-sm autocomplete" dropdown="Films in Cassette">
                        @error('contrast_batch_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Black Ink Batch No</label>
                        <input name="black_ink_batch_no" value="{{$record->black_ink_batch_no}}" type="text" class="form-control form-control-sm autocomplete" dropdown="Technique">
                        @error('black_ink_batch_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>White Light Level</label>
                        <input name="white_light_level"  value="{{$record->white_light_level}}" type="text" class="form-control form-control-sm autocomplete" dropdown="SOD">
                        <small  class="form-text text-muted">intellisense available.</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Black Light Level</label>
                        <input name="black_light_level"   value="{{$record->black_light_level}}"   type="text" class="form-control form-control-sm" dropdown="OFD">
                        <small  class="form-text text-muted">intellisense available.</small>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Light Meter Sr.No</label>
                        <input name="light_meter_sr_no"  value="{{$record->light_meter_sr_no}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="IQI">
                        @error('light_meter_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Type of Particle</label>
                        <input name="type_of_particle" value="{{$record->type_of_particle}}"  type="text" class="form-control form-control-sm autocomplete" dropdown="Sensitivity">
                        @error('type_of_particle')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Particle Medium</label>
                        <input  name="particle_medium"   value="{{$record->particle_medium}}"
                          type="text" class="form-control form-control-sm autocomplete" dropdown="Ug">
                        @error('particle_medium')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Type of Magnetism</label>
                        <input name="type_of_magnetism"    value="{{$record->type_of_magnetism}}"
                          type="text" class="form-control form-control-sm autocomplete" dropdown="Lead Screen Thickness">
                        @error('type_of_magnetism')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Configuration</label>
                        <input name="configuration"    value="{{$record->configuration}}"
                         type="text" class="form-control form-control-sm autocomplete" dropdown="Configuration">
                        @error('configuration')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Pole Spacing</label>
                        <input name="pole_spacing"    value="{{$record->pole_spacing}}"
                        type="text" class="form-control form-control-sm">
                        @error('pole_spacing')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Lifting Capacity</label>
                        <input name="lifting_capacity"  value="{{$record->lifting_capacity}}" class="form-control form-control-sm autocomplete"/>
                        @error('lifting_capacity')
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
                            <th rowspan="2">Drawing No</th>
                            <th rowspan="2">Line No.</th>
                            <th rowspan="2">Joint No.</th>
                            <th rowspan="2">Size</th>
                            <th rowspan="2">Length/Thick</th>
                            <th rowspan="2">Welder ID</th>
                            <th colspan="2">Interpretation</th>
                            <th rowspan="2">Result</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Discontinuity</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($record->interpretations as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                        <td><input name="interpretations[{{$loop->index}}][drawing_no]"     value="{{$item->drawing_no}}" readonly="readonly" class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][line_no]"    value="{{$item->line_no}}"   readonly="readonly" class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][joint_no]"   value="{{$item->joint_no}}"  readonly="readonly" class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][size]"       value="{{$item->size}}"    readonly="readonly" class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][length_thick]"    value="{{$item->length_thick}}" readonly="readonly" class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][weld]"       value="{{$item->weld}}"    readonly="readonly" class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][interpret_dis]"   value="{{$item->interpret_dis}}" readonly="readonly" class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][interpret_size]"  value="{{$item->interpret_size}}" readonly="readonly" class="form-control form-control-sm" /></td>
                            <td><input name="interpretations[{{$loop->index}}][result]"    value="{{$item->result}}"  readonly="readonly" class="form-control form-control-sm"/></td>
                            <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input name-attr="drawing_no" class="form-control form-control-sm" /></td>
                            <td><input name-attr="line_no" class="form-control form-control-sm" /></td>
                            <td><input name-attr="joint_no" class="form-control form-control-sm" /></td>
                            <td><input name-attr="size" class="form-control form-control-sm"/></td>
                            <td><input name-attr="length_thick" class="form-control form-control-sm" /></td>
                            <td><input name-attr="weld" class="form-control form-control-sm" /></td>
                            <td><input name-attr="interpret_dis" class="form-control form-control-sm"/></td>
                            <td><input name-attr="interpret_size" class="form-control form-control-sm" /></td>
                            <td><input name-attr="result" class="form-control form-control-sm"/></td>
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

        <br/>
        <div class="card">
            <div class="card-header">
                Photo Details
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <img src="/storage/{{$record->photo_1}}" width="100%">
                        <label>Photo 1</label>
                        <input id='photo_1' name="photo_1" type="file"  class="form-control-file">
                        <small class="form-text text-muted">selected image will be replaced for existing one</small>
                        @error('photo_1')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <img src="/storage/{{$record->photo_2}}" width="100%">
                        <label>Photo 2</label>
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
                        <select name="inspected_by"  value="{{$record->inspected_by}}"
                              class="form-control form-control-sm select" record="employees" ></select>
                        @error('inspected_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Authorised By</label>
                        <select name="authorised_by"  value="{{$record->authorised_by}}"
                             class="form-control form-control-sm select" record="employees" ></select>
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
