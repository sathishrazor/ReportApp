<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interpretation extends Model
{
    //
    protected $fillable = [
        "joint_no",
        "size",
        "parent",
        "weld",
        "section",
        "wire_req",
        "wire_vis",
        "density",
        "discontinuity",
        "intp_size",
        "result",
        "interpret_dis",
        "interpret_size",
        "line_no",
        "length_thick",
        "thick"
    ];

    public function r_t_report()
    {
       return $this->belongsTo(RTReport::class);
    }
}
