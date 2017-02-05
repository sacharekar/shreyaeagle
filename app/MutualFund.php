<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutualFund extends Model
{
    //
    protected $fillable=[
        'customer_id',
        'beneficiary',
        'type_of_fund',
        'number_of_funds',
        'purchase_price',
        'purchased_date',

    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}

