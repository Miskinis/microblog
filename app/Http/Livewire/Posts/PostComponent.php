<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.posts.show', ['post' => $this->post]);
    }
}
