<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'release_id',
        'comment',
        'user',
    ];

    public function release()
    {
        $this->belongsTo(Release::class);
    }
}
