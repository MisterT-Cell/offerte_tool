<?php

use App\Enums\QuoteRequestStatus;
use App\Models\QuoteRequest;

it('gives a new quote request the status new', function () {
    $quoteRequest = QuoteRequest::factory()->create();

    expect($quoteRequest->status)->toBe(QuoteRequestStatus::New);
});
