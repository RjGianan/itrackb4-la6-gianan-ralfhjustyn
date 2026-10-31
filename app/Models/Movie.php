<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'genre_id',
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

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
