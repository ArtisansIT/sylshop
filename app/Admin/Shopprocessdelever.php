<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Shopprocessdelever extends Model
{
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->belongsTo(
            Orderdetails::class,
            'orderdetails_id'
        );
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
