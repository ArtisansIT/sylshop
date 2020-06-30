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
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('auth_order', function (Builder $builder) {
            if (auth()->check() && auth()->user()->role_id == 1) {
                return $builder->where('user_id', auth()->id());
            }
        });
    }
}
