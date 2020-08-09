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
            padding: 5px
        }
        body{
            margin: 20px;
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
        <td>{{}}</td>
            <td>Client Address</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>1</td>
            <td>Project Address</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Requested By</td>
            <td>1</td>
            <td>Request No</td>
            <td>2</td>
        </tr>
        <tr>
            <td>PO. No.</td>
            <td>1</td>
            <td>W.O./ Job No.</td>
            <td>2</td>
        </tr>
    </table>
    <p><b>System Details</b></p>
    <table>
        <tr>
            <td>Procedure No.</td>
            <td>1</td>
            <td>Reference Code</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Acceptance Criteria</td>
            <td>1</td>
            <td>Project Specification</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Material</td>
            <td>1</td>
            <td>Grade</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Surface Condition</td>
            <td>1</td>
            <td>Surface Temperature</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Drawing No</td>
            <td>1</td>
            <td>Line No.</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Weld Process</td>
            <td>1</td>
            <td>Weld Reinforcement.</td>
            <td>2</td>
        </tr>
    </table>

    <p><b>Method Details</b></p>
    <table>
        <tr>
            <td>XRay Voltage/Source</td>
            <td>1</td>
            <td>Source/Focal Spot Size</td>
            <td>1</td>
            <td>Flim Manufacturer</td>
            <td>1</td>
            <td>Flim Type</td>
            <td>1</td>
        </tr>

        <tr>
            <td>Flims in Cassette</td>
            <td>1</td>
            <td>Technique</td>
            <td>1</td>
            <td>SOD</td>
            <td>1</td>
            <td>OFD</td>
            <td>1</td>
        </tr>

        <tr>
            <td>IQI</td>
            <td>1</td>
            <td>Sensitivity</td>
            <td>1</td>
            <td>Ug</td>
            <td>1</td>
            <td>Lead Screen Thickness</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Configuration</td>
            <td>1</td>
            <td>Welder ID</td>
            <td>1</td>
            <td>Technician 1</td>
            <td>1</td>
            <td>Technician 2</td>
            <td>1</td>
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

            <tr>
                <td colspan="10">
                    Flim Size
                </td>
                <td>
                    12345
                </td>
            </tr>

            <tr>
                <td colspan="10">
                    Total Films
                </td>
                <td>
                    12
                </td>
            </tr>

            <tr>
                <td>Remarks</td>
                <td colspan="10"></td>
            </tr>
        </tbody>
    </table>


    <p><b>Legend</b></p>
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

</body>

</html>
