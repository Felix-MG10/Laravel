<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ nom est requis svp',
            'email.required' => 'Le champ email est requis svp',
            'email.unique' => 'Veuiller rentrer une adresse e-mail jamais utilisee',
            'password.required' => 'mot de passe obligatoire'
        ];
    }
}
