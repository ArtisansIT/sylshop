<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citem extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}
