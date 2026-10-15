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

it('rejects a quote request with missing or invalid fields', function (string $field, string $value, string $rule) {
    Livewire::test(CreateQuoteRequest::class)
        ->set('name', 'Jan de Vries')
        ->set('email', 'jan@example.com')
        ->set('description', 'Woonkamer schilderen, ongeveer 30 m2.')
        ->set($field, $value)
        ->call('save')
        ->assertHasErrors([$field => $rule]);

    expect(QuoteRequest::count())->toBe(0);
})->with([
    'name is empty' => ['name', '', 'required'],
    'name is too long' => ['name', str_repeat('a', 256), 'max'],
    'email is empty' => ['email', '', 'required'],
    'email is invalid' => ['email', 'jan@', 'email'],
    'email is too long' => ['email', str_repeat('a', 256).'@example.com', 'max'],
    'description is empty' => ['description', '', 'required'],
    'description is too long' => ['description', str_repeat('a', 5001), 'max'],
]);
