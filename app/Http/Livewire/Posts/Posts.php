<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Posts extends Component
{
    public ?Post $post;
    public ?User $user;

    public ?User $authUser;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->authUser = auth()->user();
    }

    public function render()
    {
        if(isset($this->post))
        {
            return view('livewire.posts.show', ['post' => $this->post]);
        }
        elseif (isset($this->user))
        {
            return view('livewire.blog', ['posts' => $this->user->posts()->paginate(3)]);
        }
        return view('livewire.blog', ['posts' => Post::latest()->paginate(3)]);
    }

    public function delete()
    {
        $this->post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
