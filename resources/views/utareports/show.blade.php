<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
        }

        thead {
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            font-size: small;
        }

        body {
            margin: 15px;
        }

        .appendix-table {}

        .appendix-table td,
        .appendix-table th {
            padding: 2px;
            font-size: smaller;
        }

        .txt-right {
            text-align: right
        }

        .txt-center {
            text-align: center
        }

        .txt-left {
            text-align: left
        }

        p {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .verticalTableHeader {
    text-align:center;

    padding: 0;
    white-space:nowrap;
    transform: rotate(90deg);

}
.verticalTableHeader p {
    margin:0 -100% ;
    display:inline-block;
}
.verticalTableHeader p:before{
    content:'';
    width:0;
    padding-top:110%;/* takes width as reference, + 10% for faking some extra padding */
    display:inline-block;
    vertical-align:middle;
}

    </style>
</head>


<body>
    <p> <b>ATOMIC TECHNOLOGIES PTE LTD </b></p>
    <table>
        <tbody>
            <tr>
                <td>
                    ULTRASONIC TEST REPORT
                </td>
                <td>
                    Date of Examination
                </td>
                <td>
                    {{$record->created_at}}
                </td>
                <td>
                    Report No
                </td>
                <td>
                    MPT_NO_{{$record->id}}
                </td>
            </tr>
        </tbody>
    </table>
    <p><b>Customer Details</b></p>
    <table>
        <tr>
            <td>Owner Name</td>
            <td>
            @if ($record->owner>0)
                    {{ $record->owner_ref->name}}
                    @endif
            </td>
            <td>Owner Address</td>
            <td>{{$record->owner_address}}</td>
        </tr>
        <tr>
            <td>Client Name</td>
            <td>

            @if ($record->client>0)
                    {{ $record->client_ref->name}}
                    @endif
            </td>
            <td>Client Address</td>
            <td>{{$record->client_address}}</td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>

                @if ($record->project>0)
                    {{ $record->project_ref->name}}
                    @endif
            </td>
            <td>Project Address</td>
            <td>{{$record->project_address}}</td>
        </tr>
        <tr>
            <td>Requested By</td>
            <td>{{$record->request_by}}</td>
            <td>Request No</td>
            <td>{{$record->request_no}}</td>
        </tr>
        <tr>
            <td>PO. No.</td>
            <td>{{$record->po_tranno}}</td>
            <td>W.O./ Job No.</td>
            <td>${{$record->wo_tranno}}</td>
        </tr>
    </table>
    <p><b>System Details</b></p>
    <table>
        <tr>
            <td>Procedure No.</td>
            <td>{{$record->procedure_no}}</td>
            <td>Reference Code</td>
            <td>{{$record->reference_code}}</td>
        </tr>
        <tr>
            <td>Acceptance Criteria</td>
            <td>{{$record->acceptance_criteria}}</td>
            <td>Project Specification</td>
            <td>{{$record->project_spec}}</td>
        </tr>
        <tr>
            <td>Material</td>
            <td>{{$record->material}}</td>
            <td>Grade</td>
            <td>{{$record->grade}}</td>
        </tr>
        <tr>
            <td>Surface Condition</td>
            <td>{{$record->surface_condition}}</td>
            <td>Surface Temperature</td>
            <td>{{$record->surface_temperature}}</td>
        </tr>

        <tr>
            <td>Weld Process</td>
            <td>{{$record->weld_process}}</td>
            <td>Weld Preparation.</td>
            <td>{{$record->weld_preparation}}</td>
        </tr>
    </table>

    <p><b>Method Details</b></p>
    <table>
        <tr>
            <td>UT Equipment</td>
            <td>{{$record->ut_equipment}}</td>
            <td>UT Equipment Sr.No.</td>
            <td>{{$record->ut_equipment_sr_no}}</td>
            <td>Type of Scan</td>
            <td>{{$record->type_of_scan}}</td>
        </tr>

        <tr>
            <td>Method of Test.</td>
            <td>{{$record->method_of_test}}</td>
            <td>Cable Type.</td>
            <td>{{$record->cable_type}}</td>
            <td>Cable Length.</td>
            <td>{{$record->cable_length}}</td>
        </tr>

        <tr>
            <td>V1 Block Sr.No.</td>
            <td>{{$record->v1_block_sr_no}}</td>
            <td>V2 Block Sr.No.</td>
            <td>{{$record->v2_block_sr_no}}</td>
            <td>Cal.Block Sr.No.</td>
            <td>{{$record->cal_block_sr_no}}</td>
        </tr>
        <tr>
            <td>Couplant</td>
            <td>{{$record->couplant}}</td>
            <td>Thickness</td>
            <td>{{$record->thickness}}</td>
            <td>Weld Joint No.</td>
            <td>{{$record->weld_joint_no}}</td>
        </tr>
    </table>
    <p><b>Calibration Data Details</b></p>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Probe <br>Sr.No</th>
                <th rowspan="2">Size <br>(mm)</th>
                <th rowspan="2">Frequency <br>(MHz)</th>
                <th rowspan="2">Angle <br>(deg)</th>
                <th rowspan="2">Type</th>
                <th rowspan="2">Range <br>(mm)</th>
                <th rowspan="2">Sensitivity <br>Level(dB)</th>
                <th rowspan="2">Scanning <br>Level(dB)</th>
                <th  colspan="3">1st Hole</th>
                <th   colspan="3">2nd Hole</th>
                <th   colspan="3">3rd Hole</th>
            </tr>
            <tr>
                <th  class="verticalTableHeader">Depth <br>(mm)</th>
                <th  class="verticalTableHeader">Beam <br>path(mm)</th>
                <th  class="verticalTableHeader">Amplitude<br>(mm)</th>
                <th   class="verticalTableHeader">Depth<br>(mm)</th>
                <th  class="verticalTableHeader">Beam <br>path(mm)</th>
                <th  class="verticalTableHeader">Amplitude<br>(mm)</th>
                <th class="verticalTableHeader">Depth<br>(mm)</th>
                <th  class="verticalTableHeader">Beam <br>path(mm)</th>
                <th  class="verticalTableHeader"><p>Amplitude(mm)</p></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($record->calibrations as $row)
                <tr>
                <td width="7%">{{$loop->iteration}}</td>
                <td width="7%">{{$row->probe_sr_no}}</td>
                <td width="7%">{{$row->size}}</td>
                <td width="7%">{{$row->frequency}}</td>
                <td width="7%">{{$row->angle}}</td>
                <td width="7%">{{$row->type}}</td>
                <td width="7%">{{$row->sensistivity}}</td>
                <td width="7%">{{$row->scanning}}</td>
                <td>{{$row->hole_1_depth}}</td>
                <td>{{$row->hole_1_beam}}</td>
                <td>{{$row->hole_1_amplitude}}</td>
                <td>{{$row->hole_2_depth}}</td>
                <td>{{$row->hole_2_beam}}</td>
                <td>{{$row->hole_2_amplitude}}</td>
                <td>{{$row->hole_3_depth}}</td>
                <td>{{$row->hole_3_beam}}</td>
                <td>{{$row->hole_3_amplitude}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><b>Interpretation Details</b></p>
    <table>
        <thead>
            <tr>
                <th rowspan="2">SNo.</th>
                <th rowspan="2">Defect No.</th>
                <th rowspan="2">From <br>Datum(mm).</th>
                <th rowspan="2">Defect <br>Length (mm) </th>
                <th rowspan="2">Beam Path (dB) </th>
                <th rowspan="2">Skip Distance (mm)</th>
                <th rowspan="2">Depth <br> (mm) </th>
                <th rowspan="2">Angle (deg)</th>
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
                <td>{{$item->defect_no}}</td>
                <td>{{$item->from_datum}}</td>
                <td>{{$item->defect_length}}</td>
                <td>{{$item->beam_path}}</td>
                <td>{{$item->skip_distance}}</td>
                <td>{{$item->depth}}</td>
                <td>{{$item->angle}}</td>
                <td>{{$item->dac}}</td>
                <td>{{$item->interpret_dis}}</td>
                <td>{{$item->interpret_size}}</td>
                <td>{{$item->result}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <p><b>Legend:</b></p>
    <table class="appendix-table">
        <tr>
            <td>POR</td>
            <TD>Porosity</TD>
            <td>IC</td>
            <td>Internal Concavity</td>
            <td>CS</td>
            <td>Carbon Steel</td>
        </tr>
        <tr>
            <td>CP</td>
            <TD>Cluster Porosity</TD>
            <td>EC</td>
            <td>External Concavity</td>
            <td>SS</td>
            <td>Stainless Steel</td>
        </tr>
        <tr>
            <td>SI</td>
            <TD>Slag Inclusion</TD>
            <td>EP</td>
            <td>Excess Penetration</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>TI</td>
            <TD>Tungsten Inclusion</TD>
            <td>LOP</td>
            <td>Lack of Peneration</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CR</td>
            <TD>Crack</TD>
            <td>LOF</td>
            <td>Lack of Fusion</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>IU</td>
            <TD>Internal Under Cut</TD>
            <td>BT</td>
            <td>Burn Through</td>
            <td>NAD</td>
            <td>No Apparent Discontinuity</td>
        </tr>
        <tr>
            <td>EU</td>
            <TD>External Under Cut</TD>
            <td>W/H</td>
            <td>Warm Hole</td>
            <td>Con</td>
            <td>Concavity</td>
        </tr>
    </table>

    <p><b>Authority</b></p>
    <table>
        <thead>
            <tr>
                <td>&nbsp;</td>
                <td>Inspected By</td>
                <td>Authorized Signatory</td>
                <td>Contractor</td>
                <td>Client</td>
                <td>Owner/Third Party</td>
            </tr>
        </thead>
        <tbody>
            <tr style="min-height: 100px">
                <td>Signature</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>

                    @if ($record->inspected_by>0)
                    {{ $record->inspected_by_ref->name}}
                    @endif
                </td>
                <td>

                    @if ($record->authorised_by>0)
                    {{ $record->authorised_by_ref->name}}
                    @endif

                </td>
                <td></td>
                <td>  @if ($record->client>0)
                    {{ $record->client_ref->name}}
                    @endif</td>
                <td>  @if ($record->owner>0)
                    {{ $record->owner_ref->name}}
                    @endif</td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td>
                    @if ($record->inspected_by>0)
                    {{ $record->inspected_by_ref->level}}
                    @endif
                </td>
                <td>
                    @if ($record->authorised_by>0)
                    {{ $record->authorised_by_ref->level}}
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td>Date</td>
            <td>{{$record->created_at}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <p><b>Photo 1</b></p>

    <img src="/storage/{{$record->photo_1}}" width="100%" height="580px">
    <p><b>Photo 2</b></p>

    <img src="/storage/{{$record->photo_2}}" width="100%" height="580px">
    <p><b>Drawing</b></p>

    <img src="/storage/{{$record->drawing}}" width="100%" height="580px">
    <script>
        print();
    </script>
</body>

</html>
