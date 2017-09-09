<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'maker_id', 'title', 'description', 'text', 'type', 'color', 'price', 'picture', 'marking', 'weight', 'alias', 'img'];

    public function makers() {
        return $this->belongsTo('App\Maker', 'maker_id');
    }
    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
