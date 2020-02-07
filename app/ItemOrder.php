<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    protected $table = "item_order";
    protected $fillable = [
      'item_id', 'order_id'  
    ];
}