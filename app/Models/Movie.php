<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'rating',
        'year',
        'is_nowshowing',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'is_nowshowing' => 'boolean',
            'year' => 'integer',
        ];
    }
}
