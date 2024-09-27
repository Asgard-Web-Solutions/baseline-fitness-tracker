<?php

use App\Livewire\UserIndex;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserIndex::class)
        ->assertStatus(200);
});

 it('displays all user names', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    Livewire::test(UserIndex::class)
        ->assertSee([$user1->name, $user2->name]);
 })->done(assignee: 'jonzenor');

 it('paginates the list of users', function () {
    User::factory()->count(30)->create();

    // Simulate visiting the page and interacting with the Livewire component
    Livewire::test(UserIndex::class)
        ->assertSee(User::first()->name)
        ->assertDontSee(User::find(11)->name)
        ->call('nextPage')
        ->assertSee(User::find(11)->name) // Ensure the 11th user (on the second page) is now visible
        ->assertDontSee(User::first()->name); // Ensure the first user is no longer visible
 })->done(assignee: 'jonzenor');

 it('has pagination navigation links', function () {
    User::factory()->count(30)->create();

    Livewire::test(UserIndex::class)
        ->assertSeeHtml("nextPage('page')")
        ->call('nextPage')
        ->assertSeeHtml("previousPage('page')");
 })->done(assignee: 'jonzenor');

 it('has edit links', function () {
    $user = User::factory()->create();

    Livewire::test(UserIndex::class)
        ->call('openEditUserModal', $user->id)
        ->assertSeeLivewire('edit-user-modal')
        ->assertSee($user->name);
 })->wip(assignee: 'jonzenor');
