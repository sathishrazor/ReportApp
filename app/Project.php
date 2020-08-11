<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','description',"entity_id","created_by","manager","start_date","end_date"
    ];

    public function addressbook()
    {
       return $this->HasMany(Address::class);
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
