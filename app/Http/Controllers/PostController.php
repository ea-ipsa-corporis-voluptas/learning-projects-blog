<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SHOW ALL POSTS FILTERED BY FILTERS
    //
    public function index()
    {
        return view('posts.index', [
            'posts' => \App\Models\Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->onEachSide(3)->withQueryString()
        ]);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SHOW A SINGLE POST
    //
    public function show(\App\Models\Post $post)
    {
        ++$post->total_views;
        $post->update(['total_views' => $post->total_views]);
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
