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
            @livewire('user-index')
        </flux:tab.panel>

        <flux:tab.panel name="exercises">
            @livewire('exercise-index')
        </flux:tab.panel>
    </flux:tab.group>
</x-app-layout>
