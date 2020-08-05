<?php

namespace App\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
    public function getShopNameAttribute() //shop_name
    {
        return $this->shop->name;
    }
    public function getStockStatusAttribute() // stock_status
    {
        if (
            $this->stock->stock < 1 ||
            $this->adons->outofstock == true
        ) {
            return true;
        } else {
            return false;
        }
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }
    public function getCommentCountAttribute() // comment_count
    {
        return count($this->comments);
    }

    public function getCategoryNameAttribute() // category_name
    {
        return $this->category->name;
    }
    public function getLikesAttribute() // likes
    {
        return $this->like->count();
    }
    public function getCategoryLinkAttribute() // category_link
    {
        return [$this->category->id, $this->category->slug];
    }
    public function getViewAttribute() // comment_count
    {
        return $this->adons->view;
    }
    public function getMaxRatingAttribute() // max_rating
    {
        if (count($this->comments) > 0) {

            return $this->comments->max('rating');
        } else {
            return 0;
        }
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


    public function setOfferPriceAttribute($value)
    {
        if ($value == null) {
            $this->attributes['offer_price'] = 0;
        }
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

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('shop_products', function (Builder $builder) {
            if (
                auth()->check() &&
                auth()->user()->role_id == 3 &&
                !empty(auth()->user()->shop_id)
            ) {
                return $builder->where('shop_id', auth()->user()->shop_id);
            }
        });
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
