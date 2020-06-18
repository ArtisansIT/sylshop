<?php

namespace App\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
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


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function getSlugAttribute()
    {
        return Str::slug(
            $this->category->name . ' ' .
                $this->shop->name . ' ' .
                $this->name,
            '-'
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class)->where('status', true);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($offer) {
            $offer->products()->delete();
        });
        static::restoring(function ($offer) {
            $offer->products()->onlyTrashed()->restore();
        });
    }
}
