    <flux:row :key="$exercise->id">
        <flux:cell variant="strong">{{ $exercise->name }}</flux:cell>
        <flux:cell> -- Not Started --</flux:cell>
        <flux:cell>
            <flux:button icon="document-plus" size="sm" wire:click.stop="recordExercise" variant="ghost">Record</flux:button>

            <flux:modal name="exercise-record" class="space-y-6">
                <div>
                    <flux:heading>Record Exercise {{ $exercise->name }}</flux:heading>
                    <flux:subheading>Record your record for performing this exercise.</flux:subheading>
                </div>
            </flux:modal>
        </flux:cell>
    </flux:row>
