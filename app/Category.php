<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'alias', 'img', 'title', 'description', 'min_price', 'montage', 'leaves', 'garant'
    ];
    public function maker() {
        return $this->belongsToMany('App\Maker', 'categories_makers', 'category_id', 'maker_id');
    }
}
