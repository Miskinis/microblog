<?php

namespace App\Http\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class ShowComment extends Component
{
    public Comment $comment;

    public function render()
    {
        return view('livewire.comments.show-comment', ['comment' => $this->comment]);
    }

    public function delete()
    {
        $this->comment->delete();
        session()->flash('message', 'Comment deleted');
        return redirect(request()->header('Referer'));
    }
}
