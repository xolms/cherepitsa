<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $fillable = [
        'alias', 'usluga_id', 'title', 'description', 'img', 'text', 'name'
    ];
    public function usluga() {
        return $this->hasOne('App\Usluga', 'id', 'usluga_id');
    }
    public function getShortTextAttribute()
    {
        $text = $this->text;
        $text = preg_replace("/<h([1-6]{1})>.*?<\/h\\1>/si", '', $this->text);
        $text = preg_replace("/<img[^>]+\>/i", "", $text);
        return str_limit($text, 600);
    }
}
