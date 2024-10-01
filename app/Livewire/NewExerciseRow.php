<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Component;

class NewExerciseRow extends Component
{
    public Exercise $exercise;

    public function recordExercise()
    {
        $this->modal('exercise-record')->show();
    }

    public function render()
    {
        return view('livewire.new-exercise-row');
    }
}
