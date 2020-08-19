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
                    UTB_NO_{{$record->id}}
                </td>
            </tr>
        </tbody>
    </table>
    <p><b>Customer Details</b></p>
    <table>
        <tr>
            <td>Owner Name</td>
            <td>
            @if ($record->owner_ref)
                    {{ $record->owner_ref->name}}
                    @endif
            </td>
            <td>Owner Address</td>
            <td>{{$record->owner_address}}</td>
        </tr>
        <tr>
            <td>Client Name</td>
            <td>

            @if ($record->client_ref)
                    {{ $record->client_ref->name}}
                    @endif
            </td>
            <td>Client Address</td>
            <td>{{$record->client_address}}</td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>

                @if ($record->project_ref)
                    {{ $record->project_ref->name}}
                    @endif
            </td>
            <td>Project Address</td>
            <td>{{$record->project_address}}</td>
        </tr>
        <tr>
            <td>Requested By</td>
            <td>{{$record->requested_by}}</td>
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


    <p><b>Interpretation Details</b></p>
    <table>
        <thead class="text-center">
            <tr>
                <th class="text-vertical" rowspan="3">Ind. <br> No.</th>
                <th class="text-vertical" rowspan="3">Probe <br> Sr.No</th>
                <th class="text-vertical" rowspan="3">Probe <br> Size(mm)</th>
                <th class="text-vertical" rowspan="3">Frequency<br>(MHz)</th>
                <th class="text-vertical" rowspan="3">Transducer<br> Angle(deg)</th>
                <th class="text-vertical" rowspan="3">From Face</th>
                <th class="text-vertical" rowspan="3">Leg</th>

                <th colspan="4">Decibels</th>
                <th colspan="5">Discontinuity</th>

                <th rowspan="3" class="text-vertical">Discont.</th>
                <th rowspan="3" class="text-vertical">Result</th>

            </tr>
            <tr>
                <th class="text-vertical">Indication <br />Level(dB) </th>
                <th class="text-vertical">Reference <br />Level(dB) </th>
                <th class="text-vertical">Attenuation <br />Factor </th>
                <th class="text-vertical">Indication <br />Ratio </th>
                <th rowspan="2" class="text-vertical">Length <br>(mm)</td>
                <th rowspan="2" class="text-vertical">Angular Distance<br>(sound path)</th>
                <th rowspan="2" class="text-vertical">Depth from A <br>surface(mm)</th>
                <th colspan="2">Distance <br>(mm)</th>

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

            @foreach ($record->interpretations as $item)
            <tr>
                <tr>
                    <td>{{$item->indication_no}}</td>
                    <td>{{$item->probe_sr_no}}</td>
                    <td>{{$item->probe_size}}</td>
                    <td>{{$item->frequency}}</td>
                    <td>{{$item->transducer_angle}}</td>
                    <td>{{$item->from_face}}</td>
                    <td>{{$item->leg}}</td>
                    <td>{{$item->indication_level_a}}</td>
                    <td>{{$item->reference_level_b}}</td>
                    <td>{{$item->attenuation_factor_c}}</td>
                    <td>{{$item->indication_ratio_d}}</td>
                    <td>{{$item->length}}</td>
                    <td>{{$item->angular_distance}}</td>
                    <td>{{$item->depth_from_surface}}</td>
                    <td>{{$item->distance_from_x}}</td>
                    <td>{{$item->distance_from_y}}</td>
                    <td>{{$item->discontinuity}}</td>
                    <td>{{$item->result}}</td>
                </tr>
            </tr>
            @endforeach


            <tr>
                <td>Remarks</td>
                <td colspan="17"></td>
            </tr>
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
            <tr>
                <td style="padding:30px">Signature</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>

                    @if ($record->inspected_by_ref)
                    {{ $record->inspected_by_ref->name}}
                    @endif
                </td>
                <td>

                    @if ($record->authorised_by_ref)
                    {{ $record->authorised_by_ref->name}}
                    @endif

                </td>
                <td></td>
                <td>  @if ($record->client_ref)
                    {{ $record->client_ref->name}}
                    @endif</td>
                <td>  @if ($record->owner_ref)
                    {{ $record->owner_ref->name}}
                    @endif</td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td>
                    @if ($record->inspected_by_ref)
                    {{ $record->inspected_by_ref->level}}
                    @endif
                </td>
                <td>
                    @if ($record->authorised_by_ref)
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
