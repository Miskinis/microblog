<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.blog', ['posts' => Post::latest()->paginate(3)]);
    }
}
