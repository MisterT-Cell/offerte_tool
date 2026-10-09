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

it('stores the optional contact details', function () {
    $quoteRequest = QuoteRequest::factory()->create([
        'phone' => '0612345678',
        'address' => 'Dorpsstraat 1',
        'postal_code' => '1234 AB',
        'city' => 'Utrecht',
    ]);

    expect($quoteRequest->fresh())
        ->phone->toBe('0612345678')
        ->address->toBe('Dorpsstraat 1')
        ->postal_code->toBe('1234 AB')
        ->city->toBe('Utrecht');
});

it('allows the optional details to be empty', function () {
    $quoteRequest = QuoteRequest::factory()->create([
        'phone' => null,
        'address' => null,
        'postal_code' => null,
        'city' => null,
    ]);

    expect($quoteRequest->fresh())
        ->phone->toBeNull()
        ->address->toBeNull()
        ->postal_code->toBeNull()
        ->city->toBeNull();
});
