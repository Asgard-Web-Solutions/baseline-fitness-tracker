<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Component;

class UserExerciseTable extends Component
{
    public $newExercises;

    public function getNewExercises() {
        $this->newExercises = Exercise::all();
    }

    public function render()
    {
        $this->getNewExercises();


        return view('livewire.user-exercise-table');
    }
}
