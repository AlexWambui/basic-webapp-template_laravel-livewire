<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;

class FlashMessages extends Component
{
    public $message;
    public $type;
    public $show = false;

    #[On('notify')]
    public function notify($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.partials.flash-messages');
    }
}
