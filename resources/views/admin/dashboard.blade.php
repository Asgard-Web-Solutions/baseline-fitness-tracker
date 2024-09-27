<x-app-layout>
    <x-slot name="header">
        {{ __('Admin Control Panel') }}
    </x-slot>

    <div class="max-w-lg">
        @livewire('user-index')
    </div>
</x-app-layout>
