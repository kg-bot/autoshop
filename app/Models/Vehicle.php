<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'category',
        'name',
        'price',
        'year',
        'kilometers',
        'image_path',
        'added_by',
        'approved',
    ];
}
