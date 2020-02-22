<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    protected $fillable =['name','requirement_id','description'];

    function requirement(){
        return $this->belongsTo('App\Requirement', 'requirement_id');
    }
}
