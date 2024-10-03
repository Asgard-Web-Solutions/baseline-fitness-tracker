<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Flux\Flux;

class ExerciseIndex extends Component
{
    public $exercises;

    public Exercise $exercise;

    #[Validate('string|required')]
    public $name = null;

    #[Validate('string|nullable')]
    public $description = null;

    #[Validate('integer|nullable|max:99')]
    public $reps = null;

    #[Validate('integer|nullable|max:999')]
    public $distance = null;

    #[Validate('string|nullable|required_with:distance|max:32')]
    public $distanceUnits = null;

    #[Validate('decimal:0,2|nullable')]
    public $weightMultiplier = null;

    #[Validate('integer|nullable|max:10000')]
    public $timeSeconds = null;

    #[Validate('boolean|nullable|min:0|max:1')]
    public $invertTimeStat = null;

    #[Validate('string|nullable|max:32')]
    public $trackStat = null;

    public function mount()
    {
        $this->refreshExercises();
        $this->exercise = new Exercise();
    }

    public function save()
    {
        $this->validate();

        $this->exercise->create([
            'name' => $this->name,
            'description' => $this->description,
            'reps' => $this->reps,
            'distance' => $this->distance,
            'distance_units' => $this->distanceUnits,
            'weight_multiplier' => $this->weightMultiplier,
            'time_seconds' => $this->timeSeconds,
            'invert_time_stat' => (isset($this->invertTimeStat)) ? 1 : 0,
            'track_stat' => $this->trackStat,
        ]);

        $this->resetForm();

        $this->refreshExercises();

        $this->modal('exercise-add')->close();
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'reps', 'distance', 'distanceUnits', 'weightMultiplier', 'timeSeconds', 'invertTimeStat', 'trackStat']);
    }

    public function refreshExercises()
    {
        $this->exercises = Exercise::all() ?? collect(); // Ensure the collection is never null
    }

    public function exerciseDelete($id)
    {
        Exercise::findOrFail($id)->delete();

        Flux::modal('exercise-delete')->close();
        Flux::toast('Exercise deleted');

        $this->refreshExercises();
    }

    public function render()
    {
        return view('livewire.exercise-index')->with([
            'exercises' => $this->exercises,
        ]);
    }
}
