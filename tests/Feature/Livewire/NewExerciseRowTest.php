<?php

use App\Livewire\NewExerciseRow;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(NewExerciseRow::class)
        ->assertStatus(200);
});
