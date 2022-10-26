<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function render()
    {
        if (auth()->check()) {
            $ownPrivatePosts = $this->authUser->posts()->with('comments')->where('is_public', false)->get();

            if (isset($this->post) && $this->authUser->can('view', $this->post)) {
                return view('livewire.posts.show', ['post' => $this->post]);
            }

            if (isset($this->user)) {
                $posts = $this->user->posts()->with('comments')->where('is_public', true)->get();
                if ($this->user->id === $this->authUser->id) {
                    $posts = $posts->merge($ownPrivatePosts);
                }
                return view('livewire.blog', ['posts' => $this->paginate($posts, 3)]);
            }

            $posts = Post::with('comments')->latest()->where('is_public', true)->get();
            $posts = $posts->merge($ownPrivatePosts);
            return view('livewire.blog', ['posts' => $this->paginate($posts, 3)]);
        } else {
            if (isset($this->post) && $this->post->is_public) {
                return view('livewire.posts.show', ['post' => $this->post]);
            }

            if (isset($this->user)) {
                return view('livewire.blog', ['posts' => $this->user->posts()->with('comments')->where('is_public', true)->paginate(3)]);
            }

            return view('livewire.blog', ['posts' => Post::with('comments')->latest()->where('is_public', true)->paginate(3)]);
        }
    }

    public function delete()
    {
        $this->post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
