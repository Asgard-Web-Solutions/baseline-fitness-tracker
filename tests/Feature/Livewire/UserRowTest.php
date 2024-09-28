<?php

use App\Livewire\UserRow;
use App\Models\User;
use Livewire\Livewire;

it('renders the user row correctly', function () {
    // Create a dummy user
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'is_admin' => null,
    ]);

    // Test that the Livewire component renders the correct information
    Livewire::test('user-row', ['user' => $user])
        ->assertSee($user->name)
        ->assertSee('User');
})->done(assignee: 'jonzenor');
