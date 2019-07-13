<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_color';
    protected $fillable = ['product_id', 'color_name'];
}
