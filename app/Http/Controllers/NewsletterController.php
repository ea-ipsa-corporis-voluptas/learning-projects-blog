<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  ADD NEW SUBSCRIBER
    //
    public function store(\App\Services\Newsletter $newsletter)
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);
        try {
            $newsletter->set_subscription($attributes['email'], null, $attributes['name']);
        } catch(\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  ADD OR EDIT SUBSCRIBER
    //
    public function update(\App\Services\Newsletter $newsletter)
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'status' => 'required'
        ]);
        try { $newsletter->update_subscription_status($attributes['email'], null, $attributes['status']); }
        catch(\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  CHECK SUBSCRIPTION STATUS
    //
    public function is_subscribed(string $email, string $list = null, \App\Models\User $user)
    {

    }
}