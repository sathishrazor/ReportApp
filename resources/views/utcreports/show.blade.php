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
                    MAGNETIC POLE TEST REPORT
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
            <td>{{$record->requested_by}}</td>
            <td>Request No</td>
            <td>{{$record->requested_no}}</td>
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
            <td>Weld Reinforcement.</td>
            <td>{{$record->weld_reinforcement}}</td>
        </tr>
    </table>

    <p><b>Method Details</b></p>
    <table>
        <tr>
            <td>Type of Equipment</td>
            <td>{{$record->type_of_equipment}}</td>
            <td>Type of Current</td>
            <td>{{$record->type_of_current}}</td>
            <td>Chemical Manufacturer</td>
            <td>{{$record->chemical_manufacture}}</td>

        </tr>

        <tr>
            <td>Cleaner Batch No.</td>
            <td>{{$record->cleaner_batch_no}}</td>
            <td>Contrast Batch No.</td>
            <td>{{$record->contrast_batch_no}}</td>
            <td>Black Ink Batch No.</td>
            <td>{{$record->black_ink_batch_no}}</td>

        </tr>

        <tr>
            <td>Weight Light Level</td>
            <td>{{$record->white_light_level}}</td>
            <td>Black Light Level</td>
            <td>{{$record->black_light_level}}</td>
            <td>Light Meter Sr.No.</td>
            <td>{{$record->light_meter_sr_no}}</td>

        </tr>
        <tr>
            <td>Type of Particle</td>
            <td>{{$record->type_of_particle}}</td>
            <td>Particle Medium</td>
            <td>{{$record->particle_medium}}</td>
            <td>Type of Magnetism</td>
            <td>{{$record->type_of_magnetism}}</td>

        </tr>
        <tr>
            <td>Configuration</td>
            <td>{{$record->configuration}}</td>
            <td>Pole Spacing</td>
            <td>{{$record->pole_spacing}}</td>
            <td>Lifting Capacity</td>
            <td>{{$record->lifting_capacity}}</td>

        </tr>

    </table>


    <p><b>Interpretation Details</b></p>
    <table>
        <thead>
            <tr>
                <th rowspan="2">SNo.</th>
                <th rowspan="2">Drawing No.</th>
                <th rowspan="2">Line No.</th>
                <th rowspan="2">Joint No.</th>
                <th rowspan="2">Size</th>
                <th rowspan="2">Length/Thick</th>
                <th rowspan="2">Welder ID</th>
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
                <td>{{$item->drawing_no}}</td>
                <td>{{$item->joint_no}}</td>
                <td>{{$item->line_no}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->length_thick}}</td>
                <td>{{$item->weld}}</td>
                <td>{{$item->interpret_dis}}</td>
                <td>{{$item->interpret_size}}</td>
                <td>{{$item->result}}</td>
            </tr>
            @endforeach

            <tr>
                <td class="txt-right" colspan="9">
                    Total Joint
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td class="txt-right" colspan="9">
                    Total Diameter(in)
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>Remarks</td>
                <td colspan="9"></td>
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
                <td></td>
                <td></td>
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
                <td></td>
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
