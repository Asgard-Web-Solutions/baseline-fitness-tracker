<?php

use function Pest\Laravel\get;

it('loads the admin control panel', function () {
    get(route('acp'))
        ->assertOk()
        ->assertViewIs('admin.dashboard');
})->todo();

it('lists the current users', function () {
    //expect()->
})->todo();

it('shows a paginated list of the current users', function () {
    //expect()->
})->todo();

it('displays the exercise index component', function () {
    //expect()->
})->todo();

