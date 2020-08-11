<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $table = 'addresses';

    protected $fillable = [
        'addr1','addr2',"attention","city","state","country","zip","get_lat","get_lang"
    ];
}
