<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    public function picklist()
    {
        return $this->belongsTo(PickList::class);
    }
}
