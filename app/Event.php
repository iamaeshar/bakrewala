<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    public function products() {
        return $this->belongsToMany('App\Product', 'product_event');
    }
}
