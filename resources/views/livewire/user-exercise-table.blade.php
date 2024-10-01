<div class="mt-8">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        <flux:heading>Your Exercises</flux:heading>
        <flux:subheading></flux:subheading>
    </div>

    <flux:table>
        <flux:columns>
            <flux:column>Exercise</flux:column>
            <flux:column>Status</flux:column>
            <flux:column></flux:column>
        </flux:columns>

        <flux:rows>
            @foreach($newExercises as $exercise)
                <livewire:new-exercise-row :$exercise :key="$exercise->id" />
            @endforeach
        </flux:rows>
    </flux:table>
</div>
