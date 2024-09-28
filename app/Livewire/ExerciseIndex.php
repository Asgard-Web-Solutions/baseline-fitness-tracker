<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Component;

class ExerciseIndex extends Component
{
    public function render()
    {
        $exercises = Exercise::all();

        return view('livewire.exercise-index')->with([
            'exercises' => $exercises,
        ]);
    }
}
