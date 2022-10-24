<?php

namespace App\Http\Livewire\Posts;

use App\Models\User;
use Livewire\Component;

class UserPosts extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.blog', ['posts' => $this->user->posts()->paginate(3)]);
    }
}

