<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class PostPreview extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.post-preview');
    }
}
