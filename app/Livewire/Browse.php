<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app', ['title' => 'Home'])]
class Browse extends Component
{
    public function render()
    {
        return view('livewire.browse');
    }
}
