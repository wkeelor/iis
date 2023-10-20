<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function login_show(){
        return view('user.login');
    }

    public function registration_show(){
        return view('user.registration');
    }

    public function login(Request $request){
        $formFields = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/events')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['login' => 'Invalid Credentials'])->onlyInput('login');
    }


    public function registration(Request $request){
        // Create New User
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'login' => ['required', 'min:3', Rule::unique('users', 'login')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:6',
                'birthdate'
            ]);

            // Hash Password
            $formFields['password'] = bcrypt($formFields['password']);

            // Create User
            $user = User::create($formFields);

            // Login
            auth()->login($user);

            return redirect('/events')->with('message', 'User created and logged in');
    }
    // Logout User
    public function logout() {
        auth()->logout();
        return redirect('/events')->with('message', 'You have been logged out!');

    }
}
