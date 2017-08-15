<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'maker_id', 'title', 'description', 'text', 'type', 'color', 'price', 'picture', 'marking', 'weight', 'alias', 'img'];

    public function makers() {
        return $this->belongsTo('App\Maker', 'maker_id');
    }
}
