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

        thead{
            text-align: center;
        }
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            font-size:small;
        }
        body{
            margin: 15px;
        }
        .appendix-table{

        }
        .appendix-table td, .appendix-table  th {
            padding:2px;
            font-size: smaller;
        }
        .txt-right
        {
            text-align: right
        }

        .txt-center{
            text-align: center
        }

        .txt-left
        {
            text-align: left
        }
        p{
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
                    RADIOGRAPHIC TEST REPORT
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
                   RT_NO_{{$record->id}}
                </td>
            </tr>
        </tbody>
    </table>
    <p><b>Customer Details</b></p>
    <table>
        <tr>
            <td>Owner Name</td>
            <td> {{$record->owner_name}}</td>
            <td>Owner Address</td>
            <td>{{$record->owner_address}}</td>
        </tr>
        <tr>
            <td>Client Name</td>
            <td>{{$record->client_name}}</td>
            <td>Client Address</td>
            <td>{{$record->client_address}}</td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>{{$record->project_name}}</td>
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
            <td>Drawing No</td>
        <td>{{$record->drawing_no}}</td>
            <td>Line No.</td>
            <td>{{$record->line_no}}</td>
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
            <td>XRay Voltage/Source</td>
            <td>{{$record->xray_volt_src}}</td>
            <td>Source/Focal Spot Size</td>
            <td>{{$record->src_spot_size}}</td>
            <td>Flim Manufacturer</td>
            <td>{{$record->flim_manufacturer}}</td>
            <td>Flim Type</td>
            <td>{{$record->flim_type}}</td>
        </tr>

        <tr>
            <td>Flims in Cassette</td>
            <td>{{$record->flim_in_cassette}}</td>
            <td>Technique</td>
            <td>{{$record->technique}}</td>
            <td>SOD</td>
            <td>{{$record->sod}}</td>
            <td>OFD</td>
            <td>{{$record->ofd}}</td>
        </tr>

        <tr>
            <td>IQI</td>
            <td>{{$record->iqi}}</td>
            <td>Sensitivity</td>
            <td>{{$record->sensitivity}}</td>
            <td>Ug</td>
            <td>{{$record->ug}}</td>
            <td>Lead Screen Thickness</td>
            <td>{{$record->lead_scr_thickness}}</td>
        </tr>
        <tr>
            <td>Configuration</td>
            <td>{{$record->configuration}}</td>
            <td>Welder ID</td>
        <td>{{$record->welder_id}}</td>
            <td>Technician 1</td>
            <td>{{$record->technician_1}}</td>
            <td>Technician 2</td>
            <td>{{$record->technician_2}}</td>
        </tr>

    </table>


    <p><b>Interpretation Details</b></p>
    <table>
        <thead>
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

            @foreach ($record->interpretations as $item)
             <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->joint_no}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->parent}}</td>
                <td>{{$item->weld}}</td>
                <td>{{$item->section}}</td>
                <td>{{$item->wire_req}}</td>
                <td>{{$item->wire_vis}}</td>
                <td>{{$item->density}}</td>
                <td>{{$item->discontinuity}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->result}}</td>
            </tr>
            @endforeach

            <tr>
                <td class="txt-right" colspan="11">
                    Flim Size
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td class="txt-right" colspan="11">
                    Total Films
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>Remarks</td>
                <td colspan="11"></td>
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
                <td>SOD</td>
                <td>Source to Object Distance</td>
            </tr>
            <tr>
                <td>TI</td>
                <TD>Tungsten Inclusion</TD>
                <td>LOP</td>
                <td>Lack of Peneration</td>
                <td>OFD</td>
                <td>Object to Film Distance</td>
            </tr>
            <tr>
                <td>CR</td>
                <TD>Crack</TD>
                <td>LOF</td>
                <td>Lack of Fusion</td>
                <td>Req.</td>
                <td>Required</td>
            </tr>
            <tr>
                <td>IU</td>
                <TD>Internal Under Cut</TD>
                <td>BT</td>
                <td>Burn Through</td>
                <td>Vis</td>
                <td>Visible</td>
            </tr>
            <tr>
                <td>EU</td>
                <TD>External Under Cut</TD>
                <td>W/H</td>
                <td>Warm Hole</td>
                <td>CS</td>
                <td>Carbon Steel</td>
            </tr>
            <tr>
                <td>POR</td>
                <TD>Porosity</TD>
                <td>IC</td>
                <td>Internal Concavity</td>
                <td>CS</td>
                <td>Carbon Steel</td>
            </tr>
        </table>

        <p><b>Authority</b></p>
    <table>
        <thead>
            <tr>
                <td>&nbsp;</td>
                <td>Inspected By</td>
                <td>Authorized Signatory</td>
                <td>Contractor/Client/Qc Incharge</td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td></td>
                <td></td>
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

<script>
    print();
</script>
</body>

</html>
