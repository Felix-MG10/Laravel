<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'email' =>  'required',
            'contact' => 'required',
            'montant_journalier'  => 'required'
        ];
    }

    public function message(){
        return[
            'departement_id.required' => 'Le champ departement est requis',
            'nom.required' => 'Le champ nom est requis',
            'prenom.required' => 'Le champ prenom est requis',
            'email.required' => 'veuiller mettre une adresse email valide',
            'contact.required' => 'Le champ contact est requis',
            'montant_journalier.required' => 'Le champ montant est requis'
        ];
    }
}
