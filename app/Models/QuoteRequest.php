<?php

namespace App\Models;

use App\Enums\QuoteRequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QuoteRequest extends Model
{
    /** @use HasFactory<\Database\Factories\QuoteRequestFactory> */
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
}
