<?php

namespace App\Livewire\Partials\Navbars;

use Livewire\Component;
use App\Livewire\Actions\Auth\Logout;
use Illuminate\Support\Facades\Auth;

class Navbar2 extends Component
{
    public string $name = '';

    protected $listeners = [
        'profile-updated' => 'refreshName'
    ];

    public function mount(): void
    {
        $this->refreshName();
    }

    public function refreshName($name = null)
    {
        $this->name = $name ?? Auth::user()->full_name;
    }

    public function logout(Logout $logout)
    {
        $logout();
        $this->redirect('/', navigate:true);
    }

    public function render()
    {
        return view('livewire.partials.navbars.navbar2');
    }
}
