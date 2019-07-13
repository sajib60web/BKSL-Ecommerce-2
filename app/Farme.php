<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farme extends Model
{
    protected $table = 'farmes';
    protected $fillable = ['admin_id', 'logo', 'price', 'farme_image', 'status'];
    public $timestamps = false;
}
