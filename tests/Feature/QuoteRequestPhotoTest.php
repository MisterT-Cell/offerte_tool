<?php

use App\Models\QuoteRequest;
use App\Models\QuoteRequestPhoto;

it('belongs to a quote request', function () {
    $quoteRequest = QuoteRequest::factory()->create();

    $photo = QuoteRequestPhoto::factory()->for($quoteRequest)->create();

    expect($photo->quoteRequest->id)->toBe($quoteRequest->id);
});

it('deletes the photos when the quote request is deleted', function () {
    $photo = QuoteRequestPhoto::factory()->create();

    $photo->quoteRequest->delete();

    expect($photo->fresh())->toBeNull();
});
