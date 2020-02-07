<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
     protected $table = "item_order";
    protected $fillable = [
      'cart_id', 'item_id'  
    ];
}