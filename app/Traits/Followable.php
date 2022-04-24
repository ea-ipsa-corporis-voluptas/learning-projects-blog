<?php

namespace App\Traits;

trait Followable
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  FOLLOW
    //
    public function follow(\App\Models\User $user)
    {
        return $this->follows()
            ->save($user);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  UNFOLLOW
    //
    public function unfollow(\App\Models\User $user)
    {
        return $this->follows()
            ->detach($user);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  FOLLOW OR UNFOLLOW
    //
    public function toggleFollow(\App\Models\User $user)
    {
        $this->follows()
            ->toggle($user);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  CHECK IF USER IS IN FOLLOWING LIST
    //
    public function following(\App\Models\User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET FOLLOWS LIST
    //
    public function follows()
    {
        return $this->belongsToMany(
            \App\Models\User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }
}