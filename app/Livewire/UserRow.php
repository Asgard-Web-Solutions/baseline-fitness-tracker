<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserRow extends Component
{
    public User $user;

    #[Validate('string|required')]
    public $name = '';

    #[Validate('string|required|email')]
    public $email = '';

    #[Validate('string|required')]
    public $role = 'user';

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->is_admin ? 'admin' : 'user';
    }

    public function remove()
    {
        $this->modal('user-delete')->show();
    }

    public function confirmDeleteUser()
    {
        $this->dispatch('deleteUser', $this->user->id);
    }

    public function updateUser()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => ($this->role == 'admin') ? Carbon::now() : null,
        ]);

        $this->modal('user-edit')->close();
    }

    public function edit()
    {
        $this->modal('user-edit')->show();
    }

    public function render()
    {
        return view('livewire.user-row')->with([
            'user' => $this->user,
        ]);
    }
}
