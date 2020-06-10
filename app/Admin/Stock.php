<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
