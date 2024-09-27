<?php

namespace App\Livewire;

use App\Models\User;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
    public $editUserId = null;

    public function sort($column) {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'desc';
        }
    }

    #[\Livewire\Attributes\Computed]
    public function fetchUsers()
    {
        return User::orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
    }

    public function deleteUser($userId)
    {
        User::findOrFail($userId)->delete();

        Flux::modal('user-delete')->close();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user-index')->with([
            'users' => $this->fetchUsers(),
        ]);
    }
}
