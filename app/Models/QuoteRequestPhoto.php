<?php

namespace App\Models;

use Database\Factories\QuoteRequestPhotoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequestPhoto extends Model
{
    /** @use HasFactory<QuoteRequestPhotoFactory> */
    use HasFactory;

    /** @return BelongsTo<QuoteRequest, $this> */
    public function quoteRequest(): BelongsTo
    {
        return $this->belongsTo(QuoteRequest::class);
    }
}
