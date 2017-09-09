<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'alias', 'img', 'title', 'description', 'min_price', 'montage', 'leaves', 'garant', 'text'
    ];
    public function maker() {
        return $this->belongsToMany('App\Maker', 'categories_makers', 'category_id', 'maker_id');
    }
    public function product() {
        return $this->hasMany('App\Product', 'category_id');
    }
    public function getShortTextAttribute()
    {
        $text = $this->text;
        $text = preg_replace("/<h([1-6]{1})>.*?<\/h\\1>/si", '', $this->text);
        $text = preg_replace("/<img[^>]+\>/i", "", $text);
        return str_limit($text, 500);

    }
}
