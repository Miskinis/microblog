<?php

namespace App\Http\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateComment extends Component
{
    public ?User $user;
    public Post $post;
    public string $content;

    protected array $rules = [
        'content' => ['required'],
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->user = auth()->user();
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.comments.create-comment');
    }

    private function resetInputFields()
    {
        $this->content = '';
    }

    public function store()
    {
        if($this->user->cannot('create', Comment::class)) {
            session()->flash('comment-message', 'Cannot create comment');
            return;
        }
        $this->validate();

        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

        Comment::create([
            'user_id' => $this->user->id,
            'post_id' => $this->post->id,
            'content' => $purifier->purify($this->content)
        ]);

        $this->resetInputFields();
        return redirect(request()->header('Referer'))->with('comment-message', 'Comment Created Successfully');
    }
}
