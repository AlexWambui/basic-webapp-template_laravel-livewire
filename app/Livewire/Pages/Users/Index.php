<?php

namespace App\Livewire\Pages\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::orderBy('first_name')->paginate(50);

        return view('livewire.pages.users.index', compact('users'));
    }
}
