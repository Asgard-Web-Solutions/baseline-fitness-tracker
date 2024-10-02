<div class="mt-8">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        <flux:heading size="lg" class="strong">Your Exercises</flux:heading>
        <flux:subheading></flux:subheading>
    </div>

    <flux:table>
        <flux:columns>
            <flux:column>Exercise</flux:column>
            <flux:column>Status</flux:column>
            <flux:column>Last Number</flux:column>
            <flux:column>Last Recorded</flux:column>
            <flux:column></flux:column>
        </flux:columns>

        <flux:rows>
            @foreach($exercises as $status)
                <livewire:user-exercise-row :$status :key="$status->id" />
            @endforeach

            @foreach($newExercises as $exercise)
                <livewire:new-exercise-row :$exercise :key="$exercise->id" />
            @endforeach
        </flux:rows>
    </flux:table>
</div>
