<?php

namespace App\Livewire\Pages\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Enums\USER_STATUSES;

class Index extends Component
{
    use WithPagination;

    public function toggleStatus($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->status = match($user->status->value) {
            USER_STATUSES::ACTIVE->value => USER_STATUSES::INACTIVE->value,
            USER_STATUSES::INACTIVE->value => USER_STATUSES::BANNED->value,
            USER_STATUSES::BANNED->value => USER_STATUSES::ACTIVE->value,
            default => USER_STATUSES::ACTIVE->value,
        };
        $user->save();

        $this->dispatch('notify', type: 'success', message: 'status updated');
    }

    public function render()
    {
        $users = User::orderBy('first_name')->paginate(50);

        return view('livewire.pages.users.index', compact('users'));
    }
}
