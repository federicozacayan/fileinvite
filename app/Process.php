<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable =['customer_id','requirement_id', 'json'];
    function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
