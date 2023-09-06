<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
    }

    public function message(){
        return [
            'email.required' => 'Le champ email est requis',
            'email.email' => 'Entrer une adresse email valide',
            'email.unique' => 'veuillez entre un email unique',
            'password.required' => 'Le champ password est obligatoire'
        ];
    }
}
