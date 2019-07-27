<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
