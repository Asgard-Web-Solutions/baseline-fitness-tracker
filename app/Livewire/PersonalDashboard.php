<?php

namespace App\Livewire;

use App\Actions\ExerciseLog\GetLatestUserWeight;
use App\Models\WeightLog;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PersonalDashboard extends Component
{
    public ?WeightLog $weight;

    #[Validate('required|integer|max:999|min:1')]
    public $newWeight = '';

    public function mount()
    {
        $user = auth()->user();
        $this->weight = GetLatestUserWeight::execute($user);
    }

    public function updateWeight()
    {
        $this->validate();

        $this->weight = WeightLog::create([
            'user_id' => auth()->user()->id,
            'weight' => $this->newWeight,
        ]);

        $this->modal('record-weight')->close();
    }

    public function render()
    {
        return view('livewire.personal-dashboard');
    }
}
