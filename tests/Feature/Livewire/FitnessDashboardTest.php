<?php

use App\Livewire\FitnessDashboard;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(FitnessDashboard::class)
        ->assertStatus(200);
});
