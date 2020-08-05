<?php

namespace App\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }





    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->category->name .
            ' ' .
            $this->name, '-');
    }
    public function getProductCountAttribute() // product_count
    {
        return $this->products->count();
    }

    public function processDelever()
    {
        return $this->hasOne(Shopprocessdelever::class);
    }

    public function subcategorys()
    {
        return $this->hasMany(Subcategory::class)
            ->where('status', true);
    }
    public function products()
    {
        return $this->hasMany(Product::class)
            ->where('status', true);
    }

    public function stocks()
    {
        return $this->hasManyThrough(
            Stock::class,
            Product::class
        );
    }

    // function delete()
    // {
    //     $this->image()->delete();

    //     parent::delete();
    // }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($offer) {
            $offer->subcategorys()->delete();
            $offer->products()->delete();
            // $offer->products()->delete();
        });
        static::restoring(function ($offer) {
            $offer->subcategorys()->onlyTrashed()->restore();
            $offer->products()->onlyTrashed()->restore();
            // $offer->stocks()->onlyTrashed()->restore();
        });
    }
}
