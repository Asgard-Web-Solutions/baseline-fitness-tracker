<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserRow extends Component
{
    public User $user;

    #[Validate('string|required')]
    public $name = '';

    #[Validate('string|required|email')]
    public $email = '';

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function remove()
    {
        $this->modal('user-delete')->show();
    }

    public function render()
    {
        return view('livewire.user-row')->with([
            'user' => $this->user,
        ]);
    }
}
