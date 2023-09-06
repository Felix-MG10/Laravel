<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    public function inscription(){
        return view('users.create');
    }

    public function handleInscription(Request $request){
      try {
        $request = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
          ]);

          return redirect()->route('login')->with('success_msg', 'Compte cree');
      } catch (Exception $e) {
        dd($e);
      }
    }
}
