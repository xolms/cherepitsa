<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usluga extends Model
{
    protected $fillable = [
        'alias', 'name', 'bg', 'small_text', 'text', 'description', 'title'
    ];
    public function works() {
        return $this->hasMany('App\Works', 'usluga_id');
    }
}
