<flux:table>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <flux:columns>
        <flux:column>Exercise</flux:column>
    </flux:columns>

    <flux:rows>
        @foreach($exercises as $exercise)
            @livewire('exercise-row', ['exercise' => $exercise])
        @endforeach
    </flux:rows>
</flux:table>
