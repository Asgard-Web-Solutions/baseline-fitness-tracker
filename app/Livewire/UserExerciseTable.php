<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\ExerciseStatus;
use Livewire\Component;

class UserExerciseTable extends Component
{
    protected $listeners = ['refreshParent'];

    public $newExercises;

    public $exercises;

    public function mount()
    {
        $this->loadExercises();
    }

    public function refreshParent()
    {
        $this->loadExercises();
    }

    public function loadExercises()
    {
        $user = auth()->user();

        $this->exercises = ExerciseStatus::where('user_id', $user->id)->get();

        $this->newExercises = Exercise::whereDoesntHave('exerciseStatuses', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
    }

    public function render()
    {
        return view('livewire.user-exercise-table');
    }
}
