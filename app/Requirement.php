<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable =['name','description','days'];

    function filetype(){
        return $this->hasMany('App\FileType');
    }
}
