<?php

use App\Livewire\ExerciseIndex;
use App\Models\Exercise;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ExerciseIndex::class)
        ->assertStatus(200);
})->done(assignee: 'jonzenor');

it('displays the exercise row component', function () {
    $exercise = Exercise::factory()->create();

    Livewire::test(ExerciseIndex::class)
        ->assertOk()
        ->assertSeeLivewire('exercise-row', ['exercise' => $exercise]);
})->wip(assignee: 'jonzenor');

it('has a link to add a new exercise', function () {
    //expect()->
})->todo();

it('opens the exercise add modal', function () {
    //expect()->
})->todo();

it('saves a new exercise', function () {
    //expect()->
})->todo();

it('deletes an exercise', function () {
    //expect()->
})->todo();
