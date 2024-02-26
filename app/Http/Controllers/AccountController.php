<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function users(){
        $users = User::all();
        return view('account.users',[
            'title' => 'List of Users',
            'users' => $users,
        ]);
    }

    public function register(){
        $roles = Role::pluck('name', 'id');
        return view('account.register',[
            'title' => 'Register User',
            'roles' => $roles,
        ]);
    }


    public function store(Request $request){

        $path = $request->file('image')->store('images', 'public');

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'password' => Hash::make($request->password),
            'image' => $path,
            'login_hint' => $request->password,
        ]);

        $user->save();
        //Auth::login($user); // Log in the user after registration
        return redirect('account/users')->with('msg', 'User created successfully');
    }

    public function login(){
        return view('account.login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('home')->with('msg','You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }

    public function edit($id){
        $user = User::find($id);
        return view('account.edit',[
            'title' => 'Edit User',
            'user' => $user,
        ]);
    }

    public function update($id, Request $request){

    }

    public function details($id){
        $user = User::find($id);
        return view('account.details',[
            'title' => 'User Details',
            'user' => $user,
        ]);
    }
    public function deactivate($id){
        $user = User::find($id);
        $user->is_active = false;
        $user->save();
        return redirect('/account/users')->with('msg','User deactivated successfully');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/account/users')->with('msg','User deleted successfully');
    }

}
