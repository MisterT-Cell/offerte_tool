<?php

use App\Models\User;

it('does not show the registration paga', function () {
    $this->get('/register')->assertNotFound();
});

it('does not create an account through the registration form', function () {
    $this->post('/register', [
        'name' => 'John Doe',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertNotFound();

    $this->assertGuest();
    expect(User::count())->toBe(0);
});
