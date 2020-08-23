@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form method="POST" enctype="multipart/form-data" action="{{route("utareport.update",$record->id)}}">
        @csrf
        @method("PUT")
        <h4>Edit Ultrasonic Testing:UTA Report</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">SaveChanges</button>
                <input type="reset" class="btn btn-warning" value="Reset Form"/>
                <a href="{{route("utareport.index")}}" class="btn btn-secondary">Back</a>
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
                        <input name="procedure_no" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Procedure No">
                        @error('procedure_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Reference Code</label>
                        <input name="reference_code" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Reference Code">
                        @error('reference_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Acceptance Criteria</label>
                        <input name="acceptance_criteria" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Acceptance Criteria">
                        @error('acceptance_criteria')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Project Specification</label>
                        <input name="project_spec" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm">
                        @error('project_spec')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Material</label>

                        <input name="material" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Material">
                        @error('material')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Grade</label>
                        <input name="grade" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Grade">
                        @error('grade')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Condition</label>
                        <input name="surface_condition" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Surface Condition">
                        @error('surface_condition')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Surface Temperature</label>
                        <input name="surface_temperature" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Surface Temperature">
                        @error('surface_temperature')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Process</label>
                        <input name="weld_process" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Weld Process">
                        @error('weld_process')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Weld Preparation</label>
                        <input name="weld_preparation" value="{{$record->wo_tranno}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="Weld Reinforcement">
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
                        <input name="ut_equipment" value="{{$record->ut_equipment}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown='ut_equipment'>
                        @error('ut_equipment')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>UT Equipment Sr.No. </label>
                        <input name="ut_equipment_sr_no" value="{{$record->ut_equipment_sr_no}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="ut_equipment_sr_no">
                        @error('ut_equipment_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Type of Scan</label>
                        <input name="type_of_scan" value="{{$record->type_of_scan}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="type_of_scan">
                        @error('type_of_scan')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Method of Test</label>
                        <input name="method_of_test" value="{{$record->method_of_test}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="method_of_test">
                        @error('method_of_test')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cable Type</label>
                        <input name="cable_type" value="{{$record->cable_type}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="cable_type">
                        @error('cable_type')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cable Length</label>
                        <input name="cable_length" value="{{$record->cable_length}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="cable_length">
                        @error('cable_length')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>V1 Block Sr.No</label>
                        <input name="v1_block_sr_no" value="{{$record->v1_block_sr_no}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="v1_block_sr_no">
                        @error('v1_block_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>V2 Block Sr.No</label>
                        <input name="v2_block_sr_no" value="{{$record->v2_block_sr_no}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="v2_block_sr_no">
                        @error('v2_block_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Cal. Block Sr.No</label>
                        <input name="cal_block_sr_no" value="{{$record->cal_block_sr_no}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="cal_block_sr_no">
                        @error('cal_block_sr_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Couplant</label>
                        <input name="couplant" value="{{$record->couplant}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="couplant">
                        @error('couplant')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Thickness</label>
                        <input name="thickness" value="{{$record->thickness}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="thickness">
                        @error('thickness')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Weld Joint No.</label>
                        <input name="weld_joint_no" value="{{$record->weld_joint_no}}" type="text"
                            class="form-control form-control-sm autocomplete" dropdown="weld_joint_no">
                        @error('weld_joint_no')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <br />
        <div class="card">
            <div class="card-header">Calibration Data Details</div>

            <div class="card-body card-table">

                <table sublist-attr="calibrations" class="table table-sm table-bordered" style="width:150%">
                    <thead class="text-center">

                        <tr>
                            <th rowspan="2">SNO</th>
                            <th rowspan="2">Probe <br /> Sr.No</th>
                            <th rowspan="2">Size <br />(mm)</th>
                            <th rowspan="2">Frequency <br />(MHz)</th>
                            <th rowspan="2">Angle<br />(Deg)</th>
                            <th rowspan="2">Type</th>
                            <th rowspan="2">Range<br />(mm)</th>
                            <th rowspan="2">Sensitivity<br />Level(dB)</th>
                            <th rowspan="2">Scanning<br />Level(dB)</th>
                            <th colspan="3">1st Hole</th>
                            <th colspan="3">2nd Hole</th>
                            <th colspan="3">3rd Hole</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th class="text-vertical">Depth(mm)</th>
                            <th class="text-vertical">Beam(mm)</th>
                            <th class="text-vertical">Amplitute(%)</th>
                            <th class="text-vertical">Depth(mm)</th>
                            <th class="text-vertical">Beam(mm)</th>
                            <th class="text-vertical">Amplitute(%)</th>
                            <th class="text-vertical">Depth(mm)</th>
                            <th class="text-vertical">Beam(mm)</th>
                            <th class="text-vertical">Amplitute(%)</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($record->calibrations as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                        <td><input name="calibrations[{{$loop->index}}][probe_sr_no]"   value="{{$item->probe_sr_no}}" class="form-control form-control-sm autocomplete"
                                    dropdown="Probe Sr.No" /></td>
                            <td><input name="calibrations[{{$loop->index}}][size]"      value="{{$item->size}}"        class="form-control form-control-sm autocomplete"
                                    dropdown="Size (mm)" /></td>
                            <td><input name="calibrations[{{$loop->index}}][frequency]" value="{{$item->frequency}}"   class="form-control form-control-sm autocomplete"
                                    dropdown="Frequency (MHz)" /></td>
                            <td><input name="calibrations[{{$loop->index}}][angle]"     value="{{$item->angle}}"       class="form-control form-control-sm autocomplete"
                                    dropdown="Angle (Deg)" /></td>
                            <td><input name="calibrations[{{$loop->index}}][type]"      value="{{$item->type}}"        class="form-control form-control-sm autocomplete"
                                    dropdown="Type" /></td>
                            <td><input name="calibrations[{{$loop->index}}][range]"     value="{{$item->range}}"       class="form-control form-control-sm autocomplete"
                                    dropdown="Range (mm)" /></td>
                            <td><input name="calibrations[{{$loop->index}}][sensitivity_level]" value="{{$item->sensitivity_level}}"  class="form-control form-control-sm autocomplete"
                                    dropdown="Sensitivity Level(dB)" /></td>
                            <td><input name="calibrations[{{$loop->index}}][scanning_level]" value="{{$item->scanning_level}}"  class="form-control form-control-sm autocomplete"
                                    dropdown="Scanning Level(dB)" /></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_1_depth]"     value="{{$item->hole_1_depth}}"     class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_1_beam]"      value="{{$item->hole_1_beam}}"     class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_1_amplitude]" value="{{$item->hole_1_amplitude}}"  class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_2_depth]"     value="{{$item->hole_2_depth}}"    class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_2_beam]"      value="{{$item->hole_2_beam}}"     class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_2_amplitude]" value="{{$item->hole_2_amplitude}}"  class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_3_depth]"     value="{{$item->hole_3_depth}}"     class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_3_beam]"      value="{{$item->hole_3_beam}}"      class="form-control form-control-sm"/></td>
                                    <td><input type="number" name="calibrations[{{$loop->index}}][hole_3_amplitude]" value="{{$item->hole_3_amplitude}}"  class="form-control form-control-sm"/></td>
                            <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td><input name-attr="probe_sr_no" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_probe_sr_no" /></td>

                            <td><input name-attr="size" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_size" /></td>

                            <td><input name-attr="frequency" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_frequency" /></td>


                            <td><input name-attr="angle" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_angle" /></td>


                            <td><input name-attr="type" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_type" /></td>


                            <td><input name-attr="range" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_range" /></td>


                            <td><input name-attr="sensitivity_level" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_sensitivity_level" /></td>


                            <td><input name-attr="scanning_level" class="form-control form-control-sm autocomplete"
                                    dropdown="calibration_scanning_level" /></td>


                                    <td><input type="number" name-attr="hole_1_depth" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_1_beam" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_1_amplitude" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_2_depth" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_2_beam" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_2_amplitude" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_3_depth" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_3_beam" class="form-control form-control-sm"/></td>

                                    <td><input type="number" name-attr="hole_3_amplitude" class="form-control form-control-sm"/></td>


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
            <div class="card-header">Interpretation Details</div>

            <div class="card-body card-table">

                <table sublist-attr="interpretations" class="table table-sm table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2">SNo.</th>
                            <th rowspan="2">Defect No.</th>
                            <th rowspan="2">From <br> Datum(mm).</th>
                            <th rowspan="2">Defect <br>Length (mm) </th>
                            <th rowspan="2">Beam Path (dB) </th>
                            <th rowspan="2">Skip Distance (mm)</th>
                            <th rowspan="2">Depth <br> (mm) </th>
                            <th colspan="2">Angle (deg)</th>
                            <th rowspan="2">% DAC</th>
                            <th colspan="2">Interpretation</th>
                            <th rowspan="2">Result</th>
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
                        <td><input name="interpretations[{{$loop->index}}][defect_no]"       value="{{$item->defect_no}}"    class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][from_datum]"  value="{{$item->from_datum}}"   class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][defect_length]" value="{{$item->defect_length}}"  class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][beam_path]"   value="{{$item->beam_path}}"   class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][skip_distance]" value="{{$item->skip_distance}}"  class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][depth]"      value="{{$item->depth}}"       class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][angle]"      value="{{$item->angle}}"        class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][dac]"        value="{{$item->dac}}"       class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][interpret_dis]" value="{{$item->interpret_dis}}"  class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][interpret_size]" value="{{$item->interpret_size}}"  class="form-control form-control-sm"/></td>
                            <td><input name="interpretations[{{$loop->index}}][result]"     value="{{$item->result}}"       class="form-control form-control-sm"/></td>
                            <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input name-attr="defect_no"     class="form-control form-control-sm"/></td>
                            <td><input name-attr="from_datum"    class="form-control form-control-sm"/></td>
                            <td><input name-attr="defect_length" class="form-control form-control-sm"/></td>
                            <td><input name-attr="beam_path"     class="form-control form-control-sm"/></td>
                            <td><input name-attr="skip_distance" class="form-control form-control-sm"/></td>
                            <td><input name-attr="depth"         class="form-control form-control-sm"/></td>
                            <td><input name-attr="angle"         class="form-control form-control-sm"/></td>
                            <td><input name-attr="dac"           class="form-control form-control-sm"/></td>
                            <td><input name-attr="interpret_dis" class="form-control form-control-sm"/></td>
                            <td><input name-attr="interpret_size"class="form-control form-control-sm"/></td>
                            <td><input name-attr="result"        class="form-control form-control-sm"/></td>
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

        <br />
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

        <br />
        <div class="card">
            <div class="card-header">
                Authority Details
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Inspected By</label>
                        <select name="inspected_by" value="{{$record->inspected_by}}" class="form-control form-control-sm select"
                            record="employees"></select>
                        @error('inspected_by')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <label>Authorised By</label>
                        <select name="authorised_by" value="{{$record->authorised_by}}" class="form-control form-control-sm select"
                            record="employees"></select>
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
        var tbodyrows =  $(this).parents('table').find("tbody tr");
        var sublist = $(this).parents("table").attr("sublist-attr");
        var td = "";
       var tfoot =  $(this).parents('table').find("tfoot tr")

       tfoot.eq(0).find('input').each(function (i, el) {
            var $el = $(el);

            var auto_cmp = "";
            var dropdown = "";
            if ($el.hasClass("autocomplete")) {
                auto_cmp = "autocomplete"
                dropdown = $el.attr("dropdown");
            }
            var name = `${sublist}[${tbodyrows.length}][${$el.attr("name-attr")}]`;
            td += `<td><input type="text"
                        class="form-control form-control-sm ${auto_cmp}"
                        dropdown="${dropdown}"
                        name="${name}" readonly="readonly"
                        value="${$el.val()}"/></td>`
        });
        var tr = `<tr>
                    <td><span>${tbodyrows.length + 1}</span></td>
                    ${td}
                    <td><button class="delrow btn btn-sm"><i class="fa fa-trash"></i></button></td>
                </tr>`
        $(this).parents('table').find("tbody").append(tr);
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

    function updateIndex() {
        $("tbody").each(function(index,tbody){
            $(tbody).find('tr').each(function (i, el) {
            var row = $(el);

                $(el).find('td').eq(0).html(i+1);

            row.find("input").each(function (i2, col) {
                var prev = $(col).attr("name");
                $(col).attr("name", prev.replace(/\d+/g, i));
            })
          })
        })
    }
</script>
@endsection
