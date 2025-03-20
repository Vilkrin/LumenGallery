<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{

    public function render()
    {
        return view('livewire.create-user');
    }
}
