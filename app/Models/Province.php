<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'dealers'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function dealers()
    {
        return $this->belongsToMany(Dealer::class);
    }
}
