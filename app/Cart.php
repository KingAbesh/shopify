<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Cart extends Model
{
    protected $guarded = [];

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}