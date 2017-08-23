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
    public function getShortTextAttribute()
    {
        $text = $this->text;
        $text = preg_replace("/<h([1-6]{1})>.*?<\/h\\1>/si", '', $this->text);
        $text = preg_replace("/<img[^>]+\>/i", "", $text);
        return str_limit($text, 400);

    }
}
