<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'brand',
        'engine',
        'hp',
        'consum',
        'year',
        'top_speed',
        'acceleration',
        'price',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class)->select(['name','country']);
    }
}
