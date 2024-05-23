<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'release_id' => 'exists:releases,id|required',
            'comment' => 'required|min:2',
            'user' => 'required|min:2'
        ]);

        $comment = Comment::create($request->all());

        return response()->json($comment, 201);

    }
}
