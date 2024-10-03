<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ExerciseRow extends Component
{
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

    public $invertTimeStat = null;

    #[Validate('string|nullable|max:32')]
    public $trackStat = null;

    public function mount(Exercise $exercise)
    {
        $this->name = $exercise->name;
        $this->description = $exercise->description;
        $this->reps = $exercise->reps;
        $this->distance = $exercise->distance;
        $this->distanceUnits = $exercise->distance_units;
        $this->weightMultiplier = $exercise->weight_multiplier;
        $this->timeSeconds = $exercise->time_seconds;
        $this->invertTimeStat = $exercise->invert_time_stat;
        $this->trackStat = $exercise->track_stat;
    }

    public function update()
    {
        $this->validate();

        $this->exercise->update([
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

        $this->modal('exercise-edit')->close();
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'description',
            'reps',
            'distance',
            'distanceUnits',
            'weightMultiplier',
            'timeSeconds',
            'invertTimeStat',
            'trackStat',
        ]);
    }

    public function remove()
    {
        $this->modal('exercise-delete')->show();
    }

    public function edit()
    {
        $this->modal('exercise-edit')->show();
    }

    public function render()
    {
        return view('livewire.exercise-row');
    }
}
