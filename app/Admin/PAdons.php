<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PAdons extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
