<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $fillable = [
        'name', 'country', 'title', 'description', 'alias'
    ];
    public function category() {
        return $this->belongsToMany('App\Category', 'categories_makers', 'maker_id');
    }
    public function product() {
        return $this->hasMany('App\Product', 'maker_id');
    }
}
