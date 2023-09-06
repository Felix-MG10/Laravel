<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validFormRequest extends FormRequest
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
            'nom' => 'required|min:5',
            'email' =>'required|email'
        ];
    }

    public function messages(): array
{
    return [
        'nom.required' => 'Le champ nom est requis',
        'nom.min' => 'Le champ nom doit avoir au moins 3 caracteres',
        'email.required' => 'L\'email est requis',
        'email.email' => 'Veuillez entrer une adresse email valide'
    ];
}
}
