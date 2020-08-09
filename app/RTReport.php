<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RTReport extends Model
{
    //
    protected $fillable = [
                "owner_name",
                "owner_name",
                "owner_address",
                "client_name",
                "client_address",
                "project_name",
                "project_address",
                "requested_by",
                "request_no",
                "po_tranno",
                "wo_tranno",
                "procedure_no",
                "reference_code",
                "acceptance_criteria",
                "project_spec",
                "material",
                "grade",
                "surface_condition",
                "surface_temperature",
                "drawing_no",
                "line_no",
                "weld_process",
                "weld_reinforcement",
                "xray_volt_src",
                "src_spot_size",
                "flim_manufacturer",
                "flim_type",
                "flim_in_cassette",
                "technique",
                "sod",
                "ofd",
                "iqi",
                "sensitivity",
                "ug",
                "lead_scr_thickness",
                "configuration",
                "welder_id",
                "technician_1",
                "technician_2"
    ];

    public function interpretations()
    {
       return $this->HasMany(interpretation::class);
    }
}
