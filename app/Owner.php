<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Owner extends Model
{
    protected $fillable = [
        'name','entity_id',"created_by","email","phone","address"
    ];


    public function addressbook()
    {
       return $this->HasMany(Address::class);
    }


    public function RTReport()
    {
        return $this->belongsTo(RTReport::class);
    }



      // this is a recommended way to declare event handlers
      public static function boot() {
        parent::boot();

        static::deleting(function($emp) { // before delete() method call this
             $emp->addressbook()->delete();
             // do the rest of the cleanup...
        });
    }
}
