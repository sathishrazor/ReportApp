<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calibration extends Model
{
    //
    protected $fillable = [
        "probe_sr_no",
        "size",
        "frequency",
        "angle",

        "type",
        "range",
        "sensitivity_level",
        "scanning_level",

       "hole_1_depth",
       "hole_1_beam",
       "hole_1_amplitude",

       "hole_2_depth",
       "hole_2_beam",
       "hole_2_amplitude",

       "hole_3_depth",
       "hole_3_beam",
       "hole_3_amplitude",

    ];

    public function UTAReport()
    {
       return $this->belongsTo(UTAReport::class);
    }

}
