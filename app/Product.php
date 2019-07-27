<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public function events() {
        return $this->belongsToMany('App\Event', 'product_event');
    }

    public function breed() {
        return $this->belongsTo('App\Breed');
    }

    public function carts() {
        return $this->belongsToMany('App\Cart');
    }

    public function order() {
        return $this->hasOne('App\Order');
    }
}
