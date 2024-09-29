<?php

use App\Livewire\PersonsalDashboard;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(PersonalDashboard::class)
        ->assertStatus(200);
});
