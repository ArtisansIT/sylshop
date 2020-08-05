<?php

namespace App\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupane extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('shop_coupane', function (Builder $builder) {
            if (
                auth()->check() &&
                auth()->user()->role_id == 3 &&
                !empty(auth()->user()->shop_id)
            ) {
                return $builder->where('shop_id', auth()->user()->shop_id);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
