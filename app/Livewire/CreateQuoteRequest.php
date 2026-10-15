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
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
        ]);

        QuoteRequest::create([
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
        ]);
    }
}
