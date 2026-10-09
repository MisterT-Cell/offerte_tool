<?php

use App\Models\QuoteRequest;
use App\Models\QuoteRequestPhoto;

it('belongs to a quote request', function () {
    $quoteRequest = QuoteRequest::factory()->create();

    $photo = QuoteRequestPhoto::factory()->create([
        'quote_request_id' => $quoteRequest->id,
    ]);

    excpect($photo->quoteRequest->id)->toBe($quoteRequest->id);
});
