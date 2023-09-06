<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'departement_id' => 'required',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' =>  'required|email|unique:employes',
            'contact' => 'required|unique:employes',
            'montant_journalier'  => 'required'
        ];
    }

    public function message(){
        return[
            'departement_id.required' => 'Le champ departement est requis',
            'nom.required' => 'Le champ nom est requis',
            'nom.string' => 'Le champ nom doit etre une chaine de caractere',
            'prenom.required' => 'Le champ prenom est requis',
            'prenom.string' => 'Le champ prenom doit etre une chaine de caractere',
            'email.required' => 'veuiller mettre une adresse email valide',
            'email.unique' => 'veuiller mettre une adresse email unique',
            'contact.required' => 'Le champ contact est requis',
            'contact.unique' => 'Le champ contact doit etre unique',
            'montant_journalier.required' => 'Le champ montant est requis'
        ];
    }
}
