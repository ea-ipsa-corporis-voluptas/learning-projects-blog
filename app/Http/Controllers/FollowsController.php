<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  ALL
    //
    public function index()
    {
        return view('follows.index', [
            'follows' => auth()->user()?->follows()->latest()->paginate(6)->onEachSide(3)->withQueryString()
        ]);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  FOLLOW
    //
    public function store(\App\Models\User $user, \App\Services\Newsletter $newsletter)
    {
        $this->toggle_follow_newsletter($user, $newsletter);
        return back()
            ->with('success', ('Following ' . $user->userName . '.'));
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  UNFOLLOW
    //
    public function destroy(\App\Models\User $user, \App\Services\Newsletter $newsletter)
    {
        $this->toggle_follow_newsletter($user, $newsletter);
        return back()
            ->with('success', ('Unfollowed '. $user->userName . '.'));
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  TOGGLE FOLLOW
    //
    protected function toggle_follow_newsletter(\App\Models\User $user, \App\Services\Newsletter $newsletter)
    {
        try {
            if(!auth()->user()?->following($user)) {
                $newsletter->set_tag(auth()->user()?->email, null, $user->userName);
            }
            else {
                $newsletter->unset_tag(auth()->user()?->email, null, $user->userName);
            }
        } catch(\Exception $e) {
            back()->with('success', 'Try again later.');
        }
        auth()->user()
            ?->toggleFollow($user);
    }
}
