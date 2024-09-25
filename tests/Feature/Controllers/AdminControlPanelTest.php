<?php

use function Pest\Laravel\get;

it('loads the admin control panel', function () {
    get(route('acp'))
        ->assertOk()
        ->assertViewIs('admin.dashboard');
})->done(assignee: 'jonzenor');

it('guest users cannot access acp', function () {
    //expect()->
})->todo();

it('regular users cannot access acp', function () {
    //expect()->
})->todo();

it('loads the user index livewire component', function () {
    //expect()->
})->todo();

it('displays the exercise index component', function () {
    //expect()->
})->todo();
