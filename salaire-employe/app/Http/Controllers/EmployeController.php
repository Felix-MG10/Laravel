<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Departement;
use App\Models\Employe;
use Exception;

class EmployeController extends Controller
{
    public function index(){
        // Pour recuperer tous les employes
        // Au lieu de faire comme d habitude, on va rattacher chaque employe a son departement avec sa relation cree dans le model
        $employers = Employe::with('departement')->paginate(10);
        return view('employers.index', compact('employers'));
    }

    public function create(){
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }

    public function edit(Employe $employer){
        $departements = Departement::all();
        return view('employers.edit', compact('employer','departements'));
    }

    public function store(StoreEmployeRequest $request){

        try {
            // Autre maniere de faire le stockage d'un employe mais avec ca, les names donnes dans le formulaires doivent correspondrent aux champs present dans la table
            $query = Employe::create($request->all());

            if ($query) {
            return redirect()->route('employer.index')->with('success_msg', 'Employe Ajoute');
         }
        } catch (Exception $e) {
             dd($e);
        }

    }

    public function update(Employe $employer, UpdateEmployerRequest $request){
        try {
            $employer->nom = $request->nom;
            $employer->prenom = $request->prenom;
            $employer->email = $request->email;
            $employer->departement_id = $request->departement_id;
            $employer->contact = $request->contact;
            $employer->montant_journalier = $request->montant_journalier;

            $employer->update();
            return redirect()->route('employer.index')->with('success_msg', 'Informations mise a jour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Employe $employer){
        try {
            $employer->delete();

            return redirect()->route('employer.index')->with('success_msg', 'Suppression Reussie');
        } catch (Exception $e) {
            dd($e);
        }
    }

}
