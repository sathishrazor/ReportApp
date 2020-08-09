<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'name','entity_id',"created_by","email","phone","address"
    ];
}
