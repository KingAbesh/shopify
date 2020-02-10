<?php

namespace App;

use App\Cart;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function carts() {
        return $this->belongsToMany(Cart::class)->withTimeStamps();
    }
}