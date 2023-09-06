<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('user.register');
    }

    public function handleRegister(User $user, Request $request){
        //dd($req);
        try {
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->numero_telephone = $request->contact;
            $user->adresse_livraison = $request->adresse;

            $user->save();

            return redirect()->route('login');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
