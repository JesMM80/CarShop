<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;


class CommentsList extends Component
{
    public $release;
    public $comment;
    public $user_name;

    protected $rules = [
        'comment' => 'required',
        'user_name' => 'required'
    ];

    public function render()
    {
        $comments = Comment::where('release_id','=',$this->release->id)
            ->orderBy('id','DESC')
            ->get();
        return view('livewire.comments-list',['comments' => $comments]);
    }

    public function saveComment()
    {
        $this->validate();

        Comment::create([
            'release_id' => $this->release->id,
            'comment' => $this->comment,
            'user' => $this->user_name
        ]);

        session()->flash('commentSaved','The comment was saved!');
    }
}
