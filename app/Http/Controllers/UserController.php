<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if (Auth::user()->role == '0') {
                // return redirect('/user/home')->with('message', 'Logged in!');
                return redirect('/')->with('message', 'Logged in!');
            } elseif (Auth::user()->role == '1') {
                // return redirect('/admin/home')->with('message', 'Logged in!');
                return redirect('/')->with('message', 'Logged in!');
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3',
            'role' => 'required'
        ]);

        //Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        if ($user->role == '0') {
            // return redirect('/user/home')->with('message', 'Logged in!');
            return redirect('/')->with('message', 'Logged in!');
        } elseif ($user->role == '1') {
            // return redirect('/admin/home')->with('message', 'Logged in!');
            return redirect('/')->with('message', 'Logged in!');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been Logged out!');
    }

    // Dashboard client
    public function dashboard()
    {
        return view('users.dashboard');
    }

    // Dashboard admin
    public function adminDashboard()
    {
        return view('users.adminDashboard');
    }
}
