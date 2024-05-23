<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentsList extends Component
{
    public $release;

    public function render()
    {
        $comments = Comment::where('id','=',$this->release->id)->get();
        return view('livewire.comments-list',['comments' => $comments]);
    }
}
