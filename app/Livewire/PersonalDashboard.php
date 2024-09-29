<?php

namespace App\Livewire;

use App\Models\WeightLog;
use Livewire\Component;

class PersonalDashboard extends Component
{
    public ?WeightLog $weight;

    public function mount()
    {
        $user = auth()->user();
        $this->weight = $user->weightLogs()->latest()->first();
    }

    public function render()
    {
        return view('livewire.personal-dashboard');
    }
}
