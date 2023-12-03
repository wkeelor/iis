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

    public function index(){
        return view('user.users',[
            'users' => User::all()
        ]);
    }

    public function login(Request $request){

        $formFields = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/home')->with('message', 'You are now logged in!');
        }
        return redirect('/home')->withErrors(['login' => 'Invalid Credentials'])->withInput()->with('alreadyClicked', 'login');
    }
    public function edit(Request $request){
        // Edit User
        $user = new User();
        $user = User::find($request->id);
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

    public function edit_password_admin(Request $request) {
        $request->validate([
            'new_password' => 'required|string|min:8',
        ]);

        //Change Password
        $user = User::find($request->id);
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect('/users');
    }

    public function edit_role_admin(Request $request) {
        $request->validate([
            'role_id' => 'required',
        ]);
        $user = User::find($request->id);
        $user->role_id = $request->get('role_id');
        $user->save();

        return redirect('/users');
    }

    public function registration(Request $request){
        // Create New User
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'login' => ['required', 'min:3', Rule::unique('users', 'login')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:6',
                'birthdate',
                'role_id'
            ]);

            // Hash Password
            $formFields['password'] = bcrypt($formFields['password']);

            // Create User
            $user = User::create($formFields);

            // Login
            auth()->login($user);

            return redirect('/home')->with('message', 'User created and logged in');
    }
    // Logout User
    public function logout() {
        auth()->logout();
        return redirect('/home')->with('message', 'You have been logged out!');

    }

    public function user_soft_delete(User $user) {
        $user_changed = User::find($user->id);
        // Set a default value for the 'name' field if it's not already set
        if ($user_changed ){
            if(!$user_changed->name){
                $user_changed->name = "";
            }
            $user_changed->deleted_at = date("Y-m-d H:i:s");;
            $user_changed->save();
        }
        return redirect()->back()->with("success","User successfully deleted!");
    }

    public function user_restore(User $user) {
        $user_changed = User::find($user->id);
        // Set a default value for the 'name' field if it's not already set
        if ($user_changed ){
            if(!$user_changed->name){
                $user_changed->name = "";
            }
            $user_changed->deleted_at = null;
            $user_changed->save();
        }

        return redirect()->back()->with("success","User successfully restored!");

    }

    public function edit_password_show(User $user){
        return view('user.admin_password',[
            'user' => $user
        ]);
    }

    public function edit_role_show(User $user){
        return view('user.admin_role',[
            'user' => $user
        ]);
    }
}
