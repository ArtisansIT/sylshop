<?php

namespace App\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // public function path()
    // {
    //     return url("/category/{$this->id}-" . Str::slug($this->name));
    // }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }


    public  function scopeAllCategory($query)
    {
        return $query->with('image')->cursor();
    }

    public function shop()
    {
        return $this->hasMany(Shop::class)->where('status', true);
    }
    public function shopTrashed()
    {
        return $this->hasMany(Shop::class)->onlyTrashed();
    }

    public function products()
    {
        return $this->hasMany(Product::class)->where('status', true);
    }
    public function productsTrashed()
    {
        return $this->hasMany(Product::class)->onlyTrashed();
    }

    public function subcategorys()
    {

        return $this->hasMany(Subcategory::class)->where('status', true);
    }
    public function subcategorysTrashed()
    {

        return $this->hasMany(Subcategory::class)->onlyTrashed();
    }

    // function delete()
    // {
    //     $this->image()->delete(); // DELETE * FROM files WHERE user_id = ? query

    //     parent::delete();
    // }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($offer) {
            $offer->shop()->delete();
            $offer->subcategorys()->delete();
            $offer->products()->delete();
        });
        static::restoring(function ($offer) {
            $offer->shopTrashed()->restore();
            $offer->subcategorysTrashed()->restore();
            $offer->productsTrashed()->restore();
        });
    }
}
