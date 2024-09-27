<?php

use App\Livewire\UserRow;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserRow::class)
        ->assertStatus(200);
});
