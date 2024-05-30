<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
    ];

    public function provinces()
    {
        return $this->belongsToMany(Province::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
