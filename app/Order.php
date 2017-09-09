<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){

       return $this->belongsTo('Laravel\User');
    }
    public function address(){

        return $this->belongsTo('Laravel\Address');
    }
}
