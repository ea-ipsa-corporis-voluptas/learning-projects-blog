<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SHOW ALL POSTS FILTERED BY FILTERS
    //
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => \App\Models\Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(12)->onEachSide(3)->withQueryString()
        ]);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  REDIRECT TO POST EDITING FORM
    //
    public function edit(\App\Models\Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  REDIRECT TO POST ADDING FORM
    //
    public function create()
    {
        return view('admin.posts.create');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  ADD A POST
    //
    public function store()
    {
        $attributes = $this->validatePost();
        $attributes['user_id'] = $this->getUserId($attributes['author']);
        unset($attributes['author']);
        $attributes['thumbnail'] = $this->setThumbnail();
        \App\Models\Post::create($attributes);
        return redirect('/')->with('success', 'Your post has been added.');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  EDIT A POST
    //
    public function update(\App\Models\Post $post)
    {
        $attributes = $this->validatePost($post);
        $this->getUserId($attributes['author']);
        unset($attributes['author']);
        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = $this->setThumbnail();
        }
        $post->update($attributes);
        return back()->with('success', 'Post updated!');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  DELETE A POST
    //
    public function destroy(\App\Models\Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  VALIDATE A POST
    //
    protected function validatePost( ? \App\Models\Post $post = null ) : array
    {
        $post ??= new \App\Models\Post();
        return request()->validate([
            'title' => 'required',
            'status' => ['required', \Illuminate\Validation\Rule::in('published', 'draft')],
            'slug' => ['required', \Illuminate\Validation\Rule::unique('posts', 'slug')->ignore($post)],
            'category_id' => ['required', \Illuminate\Validation\Rule::exists('categories', 'id')],
            'author' => ['required', \Illuminate\Validation\Rule::exists('users', 'userName')],
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET USER ID BY USERNAME
    //
    protected function getUserId(string $userName)
    {
        return \App\Models\User::where('userName', $userName)->firstOrFail()->id;
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SET THUMBNAIL PATH
    //
    protected function setThumbnail()
    {
        return str_replace('public/', '', request()->file('thumbnail')->store('public/thumbnails'));
    }
}
