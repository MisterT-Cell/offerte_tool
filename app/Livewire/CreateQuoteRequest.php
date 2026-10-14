<?php

namespace App\Livewire;

use App\Models\QuoteRequest;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts::auth')]
class CreateQuoteRequest extends Component
{
    public string $name = '';

    public string $email = '';

    public string $description = '';

    public function save(): void
    {
        QuoteRequest::create([
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
        ]);
    }
}
