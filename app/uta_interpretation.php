<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uta_interpretation extends Model
{

    protected $fillable = [
        "defect_no",
        "from_datum",
        "defect_length",
        "beam_path",
        "skip_distance",
        "depth",
        "angle",
        "dac",
        "interpret_dis",
        "interpret_size",
        "result"
    ];

    public function UTAReport()
    {
       return $this->belongsTo(UTAeport::class);
    }
}
