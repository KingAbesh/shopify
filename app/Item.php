<?php

namespace App;

use App\Cart;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}