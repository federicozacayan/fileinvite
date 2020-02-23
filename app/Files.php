<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['name', 'processes_id', 'file_types', 'status', 'location'];
}
