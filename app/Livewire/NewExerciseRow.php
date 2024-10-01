<?php

namespace App\Livewire;

use App\Actions\ExerciseLog\CreateExerciseLogEntry;
use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\WeightLog;
use Flux\Flux;
use Livewire\Component;

class NewExerciseRow extends Component
{
    public Exercise $exercise;

    public ?WeightLog $weightLog;

    public $reps = '';

    public $distance = '';

    public $weight = '';

    public $time = '';

    public function mount()
    {
        $user = auth()->user();
        $this->weightLog = $user->weightLogs()->latest()->first();
    }

    public function recordExercise()
    {
        $this->modal('exercise-record')->show();
    }

    public function saveRecord()
    {
        $this->validateCheckboxes();

        if ($this->exercise->track_stat == 'reps') {
            $this->validate([
                'reps' => 'required|integer|min:1|max:999'
            ]);

            CreateExerciseLogEntry::execute($this->exercise, $this->reps);
        }

        if ($this->exercise->track_stat == 'distnace') {
            $this->validate([
                'distance' => 'required|integer|min:1|max:9999'
            ]);
        }

        if ($this->exercise->track_stat == 'weight') {
            $this->validate([
                'weight' => 'required|integer|min:1|max:999'
            ]);
        }

        if ($this->exercise->track_stat == 'time') {
            $this->validate([
                'time' => 'required|integer|min:1|max:999999'
            ]);
        }

        Flux::toast('Exercise Record Saved');

        $this->modal('exercise-record')->close();
    }

    private function validateCheckboxes()
    {
        if ($this->exercise->time_seconds && $this->exercise->track_stat != "time") {
            $this->validate([
                'time' => 'required|boolean|accepted'
            ]);
        }

        if ($this->exercise->weight_multiplier && $this->exercise->track_stat != "weight") {
            $this->validate([
                'weight' => 'required|boolean|accepted'
            ]);
        }

        if ($this->exercise->distance && $this->exercise->track_stat != "distance") {
            $this->validate([
                'distance' => 'required|boolean|accepted'
            ]);
        }

        if ($this->exercise->reps && $this->exercise->track_stat != "reps") {
            $this->validate([
                'reps' => 'required|boolean|accepted'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.new-exercise-row');
    }
}
