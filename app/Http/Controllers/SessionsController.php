<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  LOG OUT
    //
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  REDIRECT TO LOG IN FORM
    //
    public function create()
    {
        return view('sessions.create');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  LOG IN
    //
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($attributes)) {    
            // authentication fail

            // return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
            // or
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        // session fixation prevention
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');
    }
}
