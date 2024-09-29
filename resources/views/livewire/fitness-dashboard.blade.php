<div class="mt-6">
    {{-- The best athlete wants his opponent at his best. --}}

    <flux:tab.group>
        <flux:tabs>
            <flux:tab name="personal" icon="user">Personal</flux:tab>
        </flux:tabs>

        <flux:tab.panel name="personal">
            @livewire('personal-dashboard')
        </flux:tab.panel>
    </flux:tab.group>
</div>
