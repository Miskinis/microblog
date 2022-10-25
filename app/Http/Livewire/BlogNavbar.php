<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class BlogNavbar extends Component
{
    public function render()
    {
        return view('livewire.blog-navbar', ['topics' => Topic::all()]);
    }
}
