<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PickList extends Model
{
    //
    protected $fillable = [
        'name','description'
    ];

    public function options()
    {
       return $this->HasMany(Option::class);
    }

      // this is a recommended way to declare event handlers
      public static function boot() {
        parent::boot();

        static::deleting(function($picklist) { // before delete() method call this
             $picklist->options()->delete();
             // do the rest of the cleanup...
        });
    }
}
