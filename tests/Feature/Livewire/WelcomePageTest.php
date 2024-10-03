<?php

use App\Livewire\WelcomePage;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(WelcomePage::class)
        ->assertStatus(200);
});
