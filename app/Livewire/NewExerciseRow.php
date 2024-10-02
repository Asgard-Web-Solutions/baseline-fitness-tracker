<?php

namespace App\Livewire;

use App\Actions\ExerciseLog\CreateExerciseLogEntry;
use App\Actions\ExerciseLog\GetLatestUserWeight;
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
        $this->weightLog = GetLatestUserWeight::execute($user);
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

        if ($this->exercise->track_stat == 'distance') {
            $this->validate([
                'distance' => 'required|integer|min:1|max:9999'
            ]);

            CreateExerciseLogEntry::execute($this->exercise, $this->distance);
        }

        if ($this->exercise->track_stat == 'weight') {
            $this->validate([
                'weight' => 'required|integer|min:1|max:999'
            ]);

            CreateExerciseLogEntry::execute($this->exercise, $this->weight);
        }

        if ($this->exercise->track_stat == 'time') {
            $this->validate([
                'time' => 'required|integer|min:1|max:999999'
            ]);

            CreateExerciseLogEntry::execute($this->exercise, $this->time);
        }

        Flux::toast($this->exercise->name . ' Record Saved');

        $this->modal('exercise-record')->close();

        $this->refreshSelf();
    }

    public function refreshSelf()
    {
        $this->js('window.location.reload()');

        $this->dispatch('$refresh');
        $this->dispatch('$refreshParent');
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
