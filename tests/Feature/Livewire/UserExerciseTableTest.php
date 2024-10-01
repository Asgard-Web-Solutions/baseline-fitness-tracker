<?php

use App\Livewire\UserExerciseTable;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserExerciseTable::class)
        ->assertStatus(200);
});
