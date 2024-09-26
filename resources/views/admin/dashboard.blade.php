<x-app-layout>
    <x-slot name="header">
        {{ __('Admin Control Panel') }}
    </x-slot>

    <div class="w-1/2">
        @livewire('user-index')
    </div>
</x-app-layout>
