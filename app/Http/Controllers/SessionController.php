<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attribute = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attribute)) {
            session()->regenerate();
            return redirect('/home')->with('success', 'Welcome Back');

        } else {
            return back()->withInput()
                ->withErrors(['email' => 'Your Provided Details Can Not Be Verified']);
        }
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
