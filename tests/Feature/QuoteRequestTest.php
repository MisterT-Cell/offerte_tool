<?php

use App\Enums\QuoteRequestStatus;
use App\Models\QuoteRequest;

it('gives a new quote request the status new', function () {
    $quoteRequest = QuoteRequest::factory()->create();

    expect($quoteRequest->status)->toBe(QuoteRequestStatus::New);
});

it('stores the customer details', function () {
    $quoteRequest = QuoteRequest::factory()->create([
        'name' => 'Jan de Vries',
        'email' => 'jan@example.com',
        'description' => 'Painting the living room, like 30 m2',
    ]);

    expect($quoteRequest->fresh())
        ->name->toBe('Jan de Vries')
        ->email->toBe('jan@example.com')
        ->description->toBe('Painting the living room, like 30 m2');
});
