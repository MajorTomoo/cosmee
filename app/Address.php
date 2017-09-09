<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    public function user(){

        return $this->belongsTo('Laravel\User');
    }


    public function orders(){

        return $this->hasMany('Laravel\Order');

    }
}
