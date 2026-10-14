<?php

use App\Livewire\CreateQuoteRequest;

it('shows the quote request form to guests', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSeeLivewire(CreateQuoteRequest::class);
});
