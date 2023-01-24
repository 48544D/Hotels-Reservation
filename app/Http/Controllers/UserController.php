<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')->ignore(Auth::user()->id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
        ]);

        // check if password is correct
        if (!Hash::check($request->pass, Auth::user()->password)) {
            return back()->withErrors(['pass' => 'Invalid password'])->onlyInput('pass');
        }

        //Update user
        $user = User::where('id', Auth::user()->id)->update($formFields);

        return redirect('/dashboard')->with('message', 'Profile updated!');
    }

    // change password
    public function updatePassword(Request $request)
    {
        Session::flash('tab', 'password');
        $formFields = $request->validate([
            'oldPass' => 'required',
            'password' => 'required|confirmed|min:3',
        ]);

        // check if password is correct
        if (!Hash::check($request->oldPass, Auth::user()->password)) {
            return back()->withErrors(['oldPass' => 'Invalid password'])->onlyInput('oldPass');
        }

        // remove old password
        unset($formFields['oldPass']);

        //Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        //Update user
        $user = User::where('id', Auth::user()->id)->update($formFields);

        return redirect('/dashboard')->with('message' , 'Password updated!');
    }

    // Dashboard admin
    public function adminDashboard()
    {
        return view('users.adminDashboard');
    }
}
