<?php

use App\Livewire\EditUserModal;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(EditUserModal::class)
        ->assertStatus(200);
});
