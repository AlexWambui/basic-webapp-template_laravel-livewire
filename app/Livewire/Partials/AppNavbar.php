<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Livewire\Actions\Auth\Logout;

class AppNavbar extends Component
{
    public function logout(Logout $logout)
    {
        $logout();
        $this->redirect('/', navigate:true);
    }

    public function render()
    {
        return view('livewire.partials.app-navbar');
    }
}
