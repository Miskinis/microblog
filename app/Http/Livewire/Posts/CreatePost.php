<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use HTMLPurifier;
use HTMLPurifier_Config;
use Livewire\Component;

class CreatePost extends Component
{
    public User $user;

    public ?Post $post;
    public string $title = '';
    public string $content = '';
    public int $topic_id;
    public bool $is_public = false;

    public bool $update_mode = false;

    protected array $rules = [
        'title' => ['required', 'max:60'],
        'topic_id' => ['required', 'integer'],
        'content' => ['required'],
        'is_public' => ['required', 'boolean']
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->topic_id = Topic::first()->id;
        $this->user = auth()->user();
    }

    public function mount()
    {
        if (isset($this->post)) {
            $this->update_mode = true;
            $this->title = $this->post->title;
            $this->content = $this->post->content;
            $this->topic_id = $this->post->topic_id;
            $this->is_public = $this->post->is_public;
        }
    }

    public function render()
    {
        return view('livewire.posts.create', ['topics' => Topic::all()]);
    }

    private function store()
    {
        if ($this->user->cannot('create', Post::class)) {
            session()->flash('message', 'Cannot create post');
            return;
        }

        $validatedData = $this->validate();
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

        $post = Post::factory([
            'user_id' => $this->user->id,
            'title' => $validatedData['title'],
            'topic_id' => $validatedData['topic_id'],
            'content' => $purifier->purify($validatedData['content']),
            'is_public' => $validatedData['is_public']
        ])->create();

        session()->flash('message', 'Post Created Successfully.');

        return redirect(route('post', $post))->with('message', 'Post Created Successfully');
    }

    public function process()
    {
        if ($this->update_mode) {
            $this->update();
        } else {
            $this->store();
        }
    }

    private function update()
    {
        if ($this->user->cannot('update', $this->post)) {
            session()->flash('message', 'Cannot update post');
            return;
        }

        $validatedData = $this->validate();
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

        $this->post->update([
            'title' => $validatedData['title'],
            'topic_id' => $validatedData['topic_id'],
            'content' => $purifier->purify($validatedData['content']),
            'is_public' => $validatedData['is_public']
        ]);

        $this->update_mode = false;
        session()->flash('message', 'Post Updated Successfully.');

        return redirect(route('post', $this->post))->with('message', 'Post Updated Successfully');
    }

    public function delete()
    {
        $this->post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
