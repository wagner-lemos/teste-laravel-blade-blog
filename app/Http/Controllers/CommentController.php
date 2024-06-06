<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'comment' => $validated['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);

        return redirect("/posts/".$request->post_id);

    }

}
