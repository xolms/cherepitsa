<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';
    protected $fillable = [
      'name', 'name_rus', 'unit', 'required', 'position', 'index'
    ];
}
