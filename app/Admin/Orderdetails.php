<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{


    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
