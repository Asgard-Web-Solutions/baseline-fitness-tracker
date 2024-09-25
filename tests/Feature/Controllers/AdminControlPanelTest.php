<?php

use function Pest\Laravel\get;

it('loads the admin control panel', function () {
    get(route('acp'))
        ->assertOk()
        ->assertViewIs('admin.dashboard');
})->wip(assignee: 'jonzenor');

it('lists the current users', function () {
    //expect()->
})->todo();

it('shows a paginated list of the current users', function () {
    //expect()->
})->todo();

it('displays the exercise index component', function () {
    //expect()->
})->todo();

it('regular users cannot access acp', function () {
    //expect()->
})->todo();

it('guest users cannot access acp', function () {
    //expect()->
})->todo();
