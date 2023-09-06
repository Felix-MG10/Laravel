<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
       return view('users.register');
    }

    public function handleRegistration(User $user,CreateUserRequest $request){
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('acceuil')->with('success', 'Votre compte a ete cree, connecter vous');
    }

    public function login(){
        return view('users.login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }else{
            return redirect()->back()->with('error','Email ou mot de passe incorrect');
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect('login');
    }

}
