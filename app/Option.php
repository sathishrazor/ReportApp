<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $fillable = [
        'value','text'
    ];

    public function picklist()
    {
        return $this->belongsTo(PickList::class);
    }
}
