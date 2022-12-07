<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use mysql_xdevapi\CollectionAdd;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registers.create');

    }

    public function store(Request $request)
    {

        $request->only(['name', 'email', 'password', 'password_confirmation']);
        $attribute = $request->validate([
            'name' => 'required|min:3|max:255',
//            'email' => 'required|email|max:255|unique:users,name',
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email'), 'regex:/(.*)@(gmail|hotmail|yahoo|outlook)\.com/i'],
            'password' => 'required|min:7|max:255|required_with:password_confirmation|same:password_confirmation',
        ]);

        $user = User::create($attribute);

        $user->notify(new WelcomeEmailNotification());

        return redirect('/login');

    }
}
