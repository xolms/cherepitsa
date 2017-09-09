<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $fillable = [
        'name', 'country', 'title', 'description', 'alias', 'text'
    ];
    public function category() {
        return $this->belongsToMany('App\Category', 'categories_makers', 'maker_id');
    }
    public function product() {
        return $this->hasMany('App\Product', 'maker_id');
    }
    public function getShortTextAttribute()
    {
        $text = $this->text;
        $text = preg_replace("/<h([1-6]{1})>.*?<\/h\\1>/si", '', $this->text);
        $text = preg_replace("/<img[^>]+\>/i", "", $text);
        return str_limit($text, 500);

    }
}
