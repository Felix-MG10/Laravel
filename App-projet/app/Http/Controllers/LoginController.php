<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only('email','password');
        if (Auth::check()) {
            // L'utilisateur est authentifié
            echo "ok";
        } else {
            // L'utilisateur n'est pas authentifié
            echo "bad";
        }

        /*
        $credentials;

        // Authentification basée sur les informations d'identification
        if (Auth::attempt($credentials)) {
            // L'authentification a réussi
            return redirect()->route('dashboard');
        } else {
            // L'authentification a échoué
            return back()->withErrors(['message' => 'Identifiants invalides']);
        }
        */
    }


}
