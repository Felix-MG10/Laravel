<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $totalDepartements = Departement::all()->count();
        $TotalEmployes = Employe::all()->count();
        $TotalAdministrateurs = User::all()->count();
        return view('dashboard',[
            'totalDepartements' =>  $totalDepartements,
            'TotalEmployes' => $TotalEmployes,
            'TotalAdministrateurs' => $TotalAdministrateurs
        ]);
    }
}
