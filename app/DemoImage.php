<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemoImage extends Model {

    protected $table = 'demo_image';
    protected $fillable = ['large_image', 'medium_image', 'small_image'];
    public $timestamps = false;

}
