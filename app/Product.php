<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'maker_id', 'title', 'description', 'text','data','price', 'alias',];
    protected $casts = ['data' => 'array'];
    public function makers() {
        return $this->belongsTo('App\Maker', 'maker_id');
    }
    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function images() {
        return $this->hasMany('App\ProductImage', 'product_id');
    }
}
