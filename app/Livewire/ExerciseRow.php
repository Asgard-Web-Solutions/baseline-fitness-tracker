<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Component;

class ExerciseRow extends Component
{
    public Exercise $exercise;

    public function render()
    {
        return view('livewire.exercise-row');
    }
}
