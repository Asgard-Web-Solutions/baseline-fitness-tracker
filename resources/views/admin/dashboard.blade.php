<x-app-layout>
    <x-slot name="header">
        {{ __('Admin Control Panel') }}
    </x-slot>

    <flux:tab.group>
        <flux:tabs>
            <flux:tab name="users">Users</flux:tab>
            <flux:tab name="exercises">Exercises</flux:tab>
        </flux:tabs>

        <flux:tab.panel name="users">
            <flux:heading size="lg">User Manager</flux:heading>
            <flux:subheading>Manage the User accounts registered on the site.</flux:subheading>

            @livewire('user-index')
        </flux:tab.panel>

        <flux:tab.panel name="exercises">
            <flux:heading size="lg">Exercise Manager</flux:heading>
            <flux:subheading>Manage the exercises required for the Baseline Fitness Challenge.</flux:subheading>

            @livewire('exercise-index')
        </flux:tab.panel>
    </flux:tab.group>
</x-app-layout>
