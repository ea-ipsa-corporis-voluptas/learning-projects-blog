<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  REDIRECT TO REGISTRATION FORM
    //
    public function create()
    {
        return view('register.create');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  REGISTER USER
    //
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            // 'username' => ['required', 'min:3', 'max:255', \Illuminate\Validation\Rule::unique('users', 'username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:10|max:255'
        ]);
        auth()->login(\App\Models\User::create($attributes));
        // session fixation prevention
        session()->regenerate();
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
