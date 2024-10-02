<div class="mt-6">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <flux:card size="sm" class="space-y-4 max-w-64">
        <flux:subheading size="sm">Latest Weight</flux:subheading>

        <div class="flex">
            <flux:heading size="xl">
                @if (!$this->weight)
                    000 Lbs
                @else
                    {{ $this->weight->weight }} Lbs
                @endif
            </flux:heading>

            <flux:spacer />
            <flux:modal.trigger name="record-weight">
                <flux:button icon="plus"></flux:button>
            </flux:modal.trigger>

            <flux:modal name="record-weight" class="space-y-6 md:w-96">
                <div>
                    <flux:heading size="lg">Update Weight</flux:heading>
                    <flux:subheading>Record your most recent weight for an accurate calculation of how much weight is required for the exercises.</flux:subheading>
                </div>

                <form wire:submit="updateWeight" class="space-y-6">
                    <flux:input wire:model="newWeight" label="Weight" />

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Save</flux:button>
                    </div>
                </form>
            </flux:modal>
        </div>
    </flux:card>

    @if (isset($weight))
        @livewire('user-exercise-table')
    @else
        <flux:card class="mt-6">
            <flux:subheading>You will need to set your weight before you can track your exercises.</flux:subheading>
        </flux:card>
    @endif

</div>
