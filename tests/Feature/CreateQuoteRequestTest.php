<?php

use App\Livewire\CreateQuoteRequest;
use App\Models\QuoteRequest;
use Livewire\Livewire;

it('shows the quote request form to guests', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSeeLivewire(CreateQuoteRequest::class);
});

it('stores a valid quote request', function () {
    Livewire::test(CreateQuoteRequest::class)
        ->set('name', 'Jan de Vries')
        ->set('email', 'jan@example.com')
        ->set('description', 'Woonkamer schilderen, ongeveer 30 m2.')
        ->call('save')
        ->assertHasNoErrors();

    expect(QuoteRequest::sole())
        ->name->toBe('Jan de Vries')
        ->email->toBe('jan@example.com')
        ->description->toBe('Woonkamer schilderen, ongeveer 30 m2.');
});
