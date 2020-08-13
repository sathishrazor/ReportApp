<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentHistory extends Model
{
    //
    protected $fillable = [
        'name','location','user_id',"type"
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }



}
