<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PickList extends Model
{
    //
    public function options()
    {
       return $this->HasMany(Option::class);
    }
}
