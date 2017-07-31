<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title', 'text', 'description', 'img'];
    public function getShortTextAttribute()
    {
        $text = $this->text;
        $text = preg_replace("/<h([1-6]{1})>.*?<\/h\\1>/si", '', $this->text);
        return str_limit($text, 600);
    }
}
