<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }
}
