<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /*public function login_show(){
        return view('user.login');
    }*/

    public function registration_show(){
        return view('user.registration');
    }

    public function edit_show(){
        return view('user.edit')->with('user',Auth::user());
    }

    public function edit_password_show(){
        return view('user.password');
    }

    public function login(Request $request){

        $formFields = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->back()->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['login' => 'Invalid Credentials'])->withInput()->with('alreadyClicked', 'login');
    }
    public function edit(Request $request){
        // Edit User
        $user =new User();
        $user = $user->load_by_id($request->id);
        if (!(Hash::check($request->get('current_password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Nepodarilo sa upraviť vaše údaje z dôvodu zle zadaného hesla.");
        }
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'birthdate'
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->birthdate = $request['birthdate'];
        $user->save();
        return redirect()->back()->with('message','Profile Updated');
    }

    public function edit_password(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Nepodarilo sa upraviť vaše heslo z dôvodu zle zadaného hesla.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Nové a staré heslá sa nesmú zhodovať.");
        }

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
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
