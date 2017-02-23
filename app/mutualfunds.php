<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutualfunds extends Model
{ protected $fillable=[
    'customer_id',
    'symbol',
    'name',
    'volume',
    'purchase_price',
    'purchased',

];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
