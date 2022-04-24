<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  LEAVE A POST COMMENT
    //
    public function store(\App\Models\Post $post) // Request $request
    {
        // $post->comments()->create([
        //     'user_id' => $request->user()->id,
        //     'body' => $request->input('body')
        // ]);
        request()->validate([
            'body' => 'required'
        ]);
        $post->comments()->create([
            'user_id' => current_user()?->id,
            'body' => request('body')
        ]);
        return back()->with('success', 'Comment added.');
    }
}