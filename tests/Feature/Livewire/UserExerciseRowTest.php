<?php

use App\Livewire\UserExerciseRow;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserExerciseRow::class)
        ->assertStatus(200);
});
