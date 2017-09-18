<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
      'product_id', 'img', 'alt', 'index', 'color'
    ];
    public function products() {
        return $this->belongsTo('App\Production', 'product_id');
    }
    public  function activeimg() {
        return $this->hasOne('App\Production', 'product_id')->where('index', '1');
    }
}
