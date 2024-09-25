<?php

use function Pest\Laravel\get;

it('loads the admin control panel', function () {
    loginAsAdmin();

    get(route('acp'))
        ->assertOk()
        ->assertViewIs('admin.dashboard');
})->done(assignee: 'jonzenor');

it('guest users cannot access acp', function () {
    get(route('acp'))
        ->assertRedirect(route('login'));
})->done(assignee: 'jonzenor');

it('regular users cannot access acp', function () {
    loginAsUser();

    get(route('acp'))
        ->assertForbidden();
})->done(assignee: 'jonzenor');

it('loads the user index livewire component', function () {
    //expect()->
})->todo();

it('displays the exercise index component', function () {
    //expect()->
})->todo();
