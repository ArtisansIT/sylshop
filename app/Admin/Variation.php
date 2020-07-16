<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setOfferPriceAttribute($value)
    {
        if ($value == null) {
            $this->attributes['offer_price'] = 0;
        }
    }
}
