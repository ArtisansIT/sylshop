<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pickup extends Model
{
    protected $guarded = [];

    use SoftDeletes;
}
