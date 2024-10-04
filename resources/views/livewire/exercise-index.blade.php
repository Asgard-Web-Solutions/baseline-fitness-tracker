<div>
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="lg">Exercise Manager</flux:heading>
            <flux:subheading>Manage the exercises required for the Baseline Fitness Challenge.</flux:subheading>
        </div>

        <flux:modal.trigger name="exercise-add">
            <flux:button size="sm" icon="document-plus">Add Exercise</flux:button>
        </flux:modal.trigger>

        <flux:modal name="exercise-add" variant="flyout" class="space-y-6">
            <div>
                <flux:heading size="lg">Add Exercise</flux:heading>
                <flux:subheading>Add an exercise to the baseline fitness requriements.</flux:subheading>
            </div>

            <form wire:submit="save" class="space-y-6">
                <flux:input label="Name" wire:model="name" placeholder="Exercise Name" />
                <flux:textarea label="Description" wire:model="description" placeholder="Describe the exercise." />

                <flux:card class="max-w-md space-y-6">
                    <div>
                        <flux:heading>Exercise Requirments</flux:heading>
                        <flux:subheading>Enter the details required to pass this exercise.<br />If a particular metric is not required you may leave it blank.</flux:subheading>
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
    </div>


    <div class="">
        <flux:table>
            {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
            <flux:columns>
                <flux:column>Exercise</flux:column>
                <flux:column>Reps</flux:column>
                <flux:column>Distance</flux:column>
                <flux:column>Weight x</flux:column>
                <flux:column>Time</flux:column>
                <flux:column></flux:column>
            </flux:columns>

            <flux:rows>
                @foreach($exercises as $exercise)
                    @livewire('exercise-row', ['exercise' => $exercise], key($exercise->id))
                @endforeach
            </flux:rows>
        </flux:table>
    </div>
</div>
