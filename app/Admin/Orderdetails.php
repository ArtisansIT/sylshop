<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function process()
    {
        return $this->hasOne(Shopprocessdelever::class);
    }

    public function getProcecingRateAttribute() //   procecing_rate
    {
        return floor(($this->shop->procecing_rate * $this->total) / 100);
    }
    public function getProcecingCommisionAttribute() //   procecing_commision
    {
        return floor(($this->shop->procecing_commision_rate * $this->total) / 100);
    }
    public function getDeleveredRateAttribute() //delevered_rate
    {
        return floor(($this->shop->procecing_rate * $this->total) / 100);
    }
    public function getDeleveredCommisionAttribute() //delevered_commision
    {
        return floor(($this->shop->delevered_commision_rate * $this->total) / 100);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('auth_order', function (Builder $builder) {
            if (auth()->check() && auth()->user()->role_id == 3 && !empty(auth()->user()->shop_id)) {
                return $builder->where('shop_id', auth()->user()->shop_id);
            }
        });
    }
}
