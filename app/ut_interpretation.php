<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ut_interpretation extends Model
{
    //
    protected $fillable = [
        "probe_sr_no",
        "probe_size",
        "frequency",
        "transducer_angle",
        "from_face",
        "leg",
        "indication_level_a",
        "reference_level_b",
        "attenuation_factor_c",
        "indication_ratio_d",
        "length",
        "angular_distance",
        "depth_from_surface",
        "distance_from_x",
        "distance_from_y",
        "discontinuity",
        "result",
        "u_t_b_report_id",
    ];

    public function UTBReport()
    {
       return $this->belongsTo(UTBReport::class);
    }
}
