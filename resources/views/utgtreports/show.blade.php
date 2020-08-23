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
                   ULTRASONIC THICKNESS GAUGE TEST
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
                    UTGT_NO_{{$record->id}}
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
            <td>Drawing No.</td>
            <td>{{$record->drawing_no}}</td>
            <td>Line No.</td>
            <td>{{$record->line_no}}</td>
        </tr>
    </table>

    <p><b>Method Details</b></p>
    <table>
        <tr>
            <td>UTG Equipment</td>
            <td>{{$record->ut_equipment}}</td>
            <td>UTG Equipment Sr.No.</td>
            <td>{{$record->ut_equipment_sr_no}}</td>
            <td>Probe Type</td>
            <td>{{$record->probe_type}}</td>

        </tr>

        <tr>
            <td>Probe Angle.</td>
            <td>{{$record->probe_angle}}</td>
            <td>Probe Frequency.</td>
            <td>{{$record->probe_frequency}}</td>
            <td>Probe Size.</td>
            <td>{{$record->probe_size}}</td>

        </tr>

        <tr>
            <td>Probe Sr. No</td>
            <td>{{$record->probe_sr_no}}</td>
            <td>Step Wedge Sr. No.</td>
            <td>{{$record->stop_wedge_sr_no}}</td>
            <td>Couplant.</td>
            <td>{{$record->couplant}}</td>
        </tr>
    </table>



    <p><b>Interpretation Details</b></p>
    <table>
        <thead class="text-center">
            <tr>
                <th rowspan="2">Equipment</th>
                <th rowspan="2">Location</th>
                <th rowspan="2">Base Line.<br/>Reading(mm)</th>
                <th colspan="9">Remaining Thickness(mm)</th>
                <th rowspan="2">Length/Thick</th>
                <th rowspan="2">Corrosion<br/>Allowance(mm)</th>
                <th rowspan="2">Result</th>

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
                <td>{{$item->equipment}}</td>
                <td>{{$item->location}}</td>
                <td>{{$item->base_line_reading}}</td>
                <td>{{$item->rem_thick_1}}</td>
                <td>{{$item->rem_thick_2}}</td>
                <td>{{$item->rem_thick_3}}</td>
                <td>{{$item->rem_thick_4}}</td>
                <td>{{$item->rem_thick_5}}</td>
                <td>{{$item->rem_thick_6}}</td>
                <td>{{$item->rem_thick_7}}</td>
                <td>{{$item->rem_thick_8}}</td>
                <td>{{$item->minimum}}</td>
                <td>{{$item->length}}</td>
                <td>{{$item->corr_allowence}}</td>
                <td>{{$item->result}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
            <tr>
                <td>Total Spots</td>
                <td colspan="14"></td>
            </tr>
        </tbody>
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
