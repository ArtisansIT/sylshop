<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{



    protected $guarded = [];
    public function details()
    {
        return $this->hasMany(Orderdetails::class);
    }

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('auth_order', function (Builder $builder) {
            if (auth()->check()) {
                return $builder->where('user_id', auth()->id());
            }
        });
    }
}
