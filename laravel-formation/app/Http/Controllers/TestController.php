<?php

namespace App\Http\Controllers;

use App\Http\Requests\validFormRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function method1($userName){
        return 'Bienvenue '.$userName;
    }

    public function exemple(){
        return 'Ceci est un exemple';
    }


    

    public function store(validFormRequest $request){
        //dd($request);

        $verif = $request;
        if($verif){
            echo("Formulaire valide");
        }else
            return redirect()->back();
    }

}
