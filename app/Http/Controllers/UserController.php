<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Login page
    public function login()
    {
        return view('users.login');
    }

    // Auth the user
    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Logged In !');
        }

        return back()->withErrors(['name' => 'Invalid Credentials'])->onlyInput('name');
    }

    // Register page
    public function register()
    {
        return view('users.register');
    }

    // Create a user
    public function create(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        //create the user
        $user = User::create($formFields);

        //login the user
        auth()->login($user);

        return redirect('/')->with('message', 'Logged in!');
    }

    //Logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
