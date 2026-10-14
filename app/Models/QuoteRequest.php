<?php

namespace App\Models;

use App\Enums\QuoteRequestStatus;
use Database\Factories\QuoteRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuoteRequest extends Model
{
    /** @use HasFactory<QuoteRequestFactory> */
    use HasFactory;

    protected $attributes = [
        'status' => QuoteRequestStatus::New->value,
    ];

    protected function casts(): array
    {
        return [
            'status' => QuoteRequestStatus::class,
        ];
    }

    /** @return HasMany<QuoteRequestPhoto, $this> */
    public function photos(): HasMany
    {
        return $this->hasMany(QuoteRequestPhoto::class);
    }
}
