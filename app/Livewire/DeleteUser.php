<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class DeleteUser extends Component
{

    public function deleteUser(User $user)
    {
        $user->deleteProfilePhoto(); // Deletes profile photo if exists
        $user->tokens->each->delete(); // Revokes API tokens
        $user->delete(); // Deletes user

        session()->flash('message', 'User Deleted Successfully.');

        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}
