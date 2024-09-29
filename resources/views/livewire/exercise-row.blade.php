<flux:row>
    <flux:cell variant="strong">{{ $exercise->name }}</flux:cell>
    <flux:cell>
        @if ($exercise->track_stat == 'reps')
            <span class="font-bold text-blue-400">{{ $exercise->reps }}</span>
        @else
            {{ $exercise->reps }}
        @endif
    </flux:cell>
    <flux:cell>
        @if ($exercise->track_stat == 'distance')
            <span class="font-bold text-blue-400">{{ $exercise->distance }} {{ $exercise->distance_units }}</span>
        @else
            {{ $exercise->distance }} {{ $exercise->distance_units }}
        @endif
    </flux:cell>
    <flux:cell>
        @if ($exercise->track_stat == 'weight')
            <span class="font-bold text-blue-400">{{ $exercise->weight_multiplier }}</span>
        @else
            {{ $exercise->weight_multiplier }}
        @endif
    </flux:cell>
    <flux:cell>
        @if (!is_null($exercise->time_seconds))
            @if ($exercise->track_stat == 'time')
                <span class="font-bold text-blue-400">{{ gmdate('i:s', $exercise->time_seconds) }}</span>
            @else
            {{ gmdate('i:s', $exercise->time_seconds) }}
            @endif
        @endif
    </flux:cell>
    <flux:cell align="right">
        <flux:dropdown align="end" offset="-15">
            <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>

            <flux:menu class="min-w-32">
                <flux:menu.item wire:click="edit" icon="pencil-square">Edit</flux:menu.item>
                <flux:menu.item wire:click="remove" icon="trash" variant="danger">Delete</flux:menu.item>
            </flux:menu>
        </flux:dropdown>

        <flux:modal name="exercise-delete" class="min-w-[22rem]">
            <form class="space-y-6" wire:submit="$parent.exerciseDelete({{ $exercise->id }})">
                <div>
                    <flux:heading size="lg">Delete Exercise {{ $exercise->name }}?</flux:heading>
                    <flux:subheading>
                        <p>Do you want to delete this exercise?</p>
                        <p>This action cannot be undone!</p>
                    </flux:subheading>
                </div>
                <div class="flex">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Delete Exercise</flux:button>
                </div>
            </form>
        </flux:modal>

        <flux:modal name="exercise-edit" class="space-y-6" variant="flyout">
            <div>
                <flux:heading size="lg">Edit Exercise</flux:heading>
                <flux:subheading>Edit the exercise to the baseline fitness requriements.</flux:subheading>
            </div>

            <form wire:submit="update" class="space-y-6">
                <flux:input label="Name" wire:model="name" placeholder="Exercise Name" />
                <flux:textarea label="Description" wire:model="description" placeholder="Describe the exercise." />

                <flux:card class="max-w-md space-y-6">
                    <div>
                        <flux:heading>Exercise Requirments</flux:heading>
                        <flux:subheading>Enter the details required to pass this exercise.<br /> If a particular metric is not required you may leave it blank.</flux:subheading>
                    </div>

                    <flux:input label="Reps" placeholder="The number of reps required" wire:model="reps" />
                    <flux:input label="Distance" placeholder="Distance given as a whole number" wire:model="distance" />
                    <flux:input label="Distance Units" placeholder="The units used for the distance (ft, kilometers, etc)" wire:model="distanceUnits" />
                    <flux:input label="Weight Multiplier" placeholder="The weight required based on the users body weight" wire:model="weightMultiplier" />
                    <flux:input label="Time in Seconds" placeholder="The time required to complete the exercise, in seconds" wire:model="timeSeconds" />
                </flux:card>

                <flux:card class="max-w-md space-y-6">
                    <div>
                        <flux:heading>Stat Tracking</flux:heading>
                        <flux:subheading>Select which stat will be the primary stat that<br />users will have to work up to.</flux:subheading>
                    </div>

                    <flux:radio.group wire:model="trackStat" label="Choose what stat will be tracked">
                        <flux:radio value="reps" label="Reps" />
                        <flux:radio value="distance" label="Distance" />
                        <flux:radio value="weight" label="Weight" />
                        <flux:radio value="time" label="Time" />
                    </flux:radio.group>

                    <flux:checkbox wire:model="invertTimeStat" label="Target time is Minimum goal instead of max time" />
                </flux:card>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </flux:modal>
    </flux:cell>
</flux:row>
