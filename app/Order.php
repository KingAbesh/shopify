<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user() {
        $this->belongsTo('App\User::class');
    }
    //
}