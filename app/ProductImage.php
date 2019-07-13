<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['large_image', 'medium_image', 'small_image'];
    public $timestamps = false;
}
