<?php

namespace App\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
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


    public function orderDetails()
    {
        return $this->hasMany(Orderdetails::class);
    }

    public function getSlugAttribute()
    {
        return Str::slug(
            $this->category->name . ' ' .
                $this->shop->name . ' ' .
                $this->subcategory->name . ' ' .
                $this->name,
            '-'
        );
    }



    public function adons()
    {
        return $this->hasOne(PAdons::class);
    }





    public function variations()
    {
        return $this->hasMany(Variation::class)->where('status', true);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getDiscountRateAttribute() //$product->discount_rate
    {
        if ($this->offer_price == null || $this->offer_price == 0) {
            return 0;
        } else {

            $data = floor((($this->main_price - $this->offer_price) / $this->main_price)  * 100);
            return $data;
        }
    }



    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($offer) {
    //         $offer->stock()->delete();
    //     });
    //     static::restoring(function ($offer) {
    //         $offer->stock()->onlyTrashed()->restore();
    //     });
    // }
}
