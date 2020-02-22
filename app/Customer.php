<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =['name', 'email'];
    function process(){
        return $this->hasMany('App\Process');
    }
}
