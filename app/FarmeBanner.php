<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmeBanner extends Model
{
    protected $table = 'farme_banners';
    protected $fillable = ['admin_id', 'farme_id', 'banner_logo', 'banner_name', 'banner_price', 'banner_image'];
    public $timestamps = false;
}
