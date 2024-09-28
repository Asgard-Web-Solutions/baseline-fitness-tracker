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

    Livewire::test(ExerciseRow::class)
        ->assertOk()
        ->assertSeeLivewire('exercise-row', ['exercise' => $exercise]);
})->wip(assignee: 'jonzenor');

it('paginates the exercise list', function () {
    Exercise::factory()->count(30)->create();

    // Simulate visiting the page and interacting with the Livewire component
    Livewire::test(ExerciseIndex::class)
        ->assertSee(Exercise::first()->name)
        ->assertDontSee(Exercise::find(11)->name)
        ->call('nextPage')
        ->assertSee(Exercise::find(11)->name)
        ->assertDontSee(Exercise::first()->name);
})->todo(assignee: 'jonzenor');

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
