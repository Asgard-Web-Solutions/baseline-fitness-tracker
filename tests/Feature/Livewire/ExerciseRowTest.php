<?php

use App\Livewire\ExerciseRow;
use App\Models\Exercise;
use Livewire\Livewire;

it('renders successfully', function () {
    $exercise = Exercise::factory()->create();
    Livewire::test(ExerciseRow::class, ['exercise' => $exercise])
        ->assertStatus(200);
})->done(assignee: 'jonzenor');

it('displays the exercise information', function () {
    $exercise = Exercise::factory()->create();

    Livewire::test(ExerciseRow::class, ['exercise' => $exercise])
        ->assertOk()
        ->assertSee($exercise->name);
})->done(assignee: 'jonzenor');

it('has an edit button', function () {
    //expect()->
})->todo();

it('opens the exercise edit modal', function () {
    //expect()->
})->todo();

it('has an exercise delete button', function () {
    //expect()->
})->todo();

it('opens the exercise delete confirmation modal', function () {
    //expect()->
})->todo();

it('calls the exercies delete method', function () {
    //expect()->
})->todo();
