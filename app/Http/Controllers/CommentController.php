<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ideas;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(ideas $idea) {
        // dump(request()->all());
        // dd()

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Comment posted successfully');

    }
}
