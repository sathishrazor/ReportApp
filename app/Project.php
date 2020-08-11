<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','description',"created_by","manager"
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
