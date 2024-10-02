    <flux:row :key="$exercise->id">
        <flux:cell variant="strong">{{ $exercise->name }}</flux:cell>
        <flux:cell colspan="3"><flux:badge size="sm">-- Not Started --</flux:badge></flux:cell>
        <flux:cell>
            <flux:button icon="document-plus" size="sm" wire:click.stop="recordExercise" variant="ghost">Record</flux:button>

            <flux:modal name="exercise-record" class="space-y-6 min-w-96">
                <div>
                    <flux:heading size="lg">{{ $exercise->name }}</flux:heading>
                    <flux:subheading style="word-wrap: break-word; white-space: normal;">{{ $exercise->description }}</flux:subheading>
                </div>

                <form wire:submit="saveRecord" class="space-y-6">
                    <flux:fieldset>
                        <flux:legend>Exercise Details</flux:legend>

                        <div class="space-y-6">
                            @if ($exercise->reps)
                                @if ($exercise->track_stat == 'reps')
                                    <flux:input wire:model="reps" label="Reps Completed:" />
                                @else
                                    <flux:switch wire:model="reps" label="Reps Completed: {{ $exercise->reps }}" description="Did you perform the required reps?" />
                                @endif

                                <flux:separator variant="subtle" />
                            @endif

                            @if ($exercise->distance)
                                @if ($exercise->track_stat == 'distance')
                                    <flux:input wire:model="distance" label="Distance Completed in {{ $exercise->distance_units }}:" />
                                @else
                                    <flux:switch wire:model="distance" label="Distance Completed: {{ $exercise->distance }} {{ $exercise->distance_units }}" description="Did you perform the required distance?" />
                                @endif

                                <flux:separator variant="subtle" />
                            @endif

                            @if ($exercise->weight_multiplier)
                                @if ($exercise->track_stat == 'weight')
                                    <flux:input wire:model="weight" label="Weight Completed:" description="Target Weight: {{ round($weightLog->weight * $exercise->weight_multiplier) }} Lbs" />
                                @else
                                    <flux:switch wire:model="weight" label="Weight Used: {{ $exercise->reps }}" description="Did use the required weight?" />
                                @endif

                                <flux:separator variant="subtle" />
                            @endif

                            @if ($exercise->time_seconds)
                                @if ($exercise->track_stat == 'time')
                                    <flux:input wire:model="time" label="Time Completed (in Seconds):" />
                                @else
                                    <flux:switch wire:model="time" label="Time Completed: {{ $exercise->time_seconds }}" description="Did you perform in the required time?" />
                                @endif

                                <flux:separator variant="subtle" />
                            @endif
                        </div>

                        <div class="flex mt-6">
                            <flux:spacer />
                            <flux:button type="submit" variant="primary">Save Record</flux:button>
                        </div>
                    </flux:fieldset>
                </form>
            </flux:modal>
        </flux:cell>
    </flux:row>
