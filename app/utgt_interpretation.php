<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utgt_interpretation extends Model
{
    //
    protected $fillable = [

        "u_t_g_t_report_id",
        "equipment",
        "location",
        "base_line",
        "rem_thick_1",
        "rem_thick_2",
        "rem_thick_3",
        "rem_thick_4",
        "rem_thick_5",
        "rem_thick_6",
        "rem_thick_7",
        "rem_thick_8",
        "minimum",
        "corr_allowence",
        "result",
        "base_line_reading",
        "length"
    ];

    public function UTGTReport()
    {
       return $this->belongsTo(UTGTReport::class);
    }
}
