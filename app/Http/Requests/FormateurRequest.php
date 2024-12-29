<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                // 'matricule' => 'required|numeric',
                'name' => 'required|alpha',
                'email' => 'required|email',
                'password' => 'required|alpha',
                'genre' => 'required|in:M,F',
                'role' => 'required|in:admin,prof',

                // 'date_naissance' => 'required|date',
                // 'salaire' => 'required|numeric|min:3000',
        ];
    }
    public function messages(): array
    {
        return [
            // 'name.required' => 'Le champ Matricule est obligatoire.',
            // 'matricule.numeric' => 'Le champ Matricule doit être un nombre.',
            'name.required' => 'Le champ Nom est obligatoire.',
            'name.alpha' => 'Le champ Nom doit contenir uniquement des lettres.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le champ email doit contenir @.',
            'password.required' => 'Le champ password est obligatoire.',
            'password.alpha' => 'Le champ password doit contenir uniquement des lettres.',
            'genre.required' => 'Le champ Genre est obligatoire.',
            'genre.in' => 'Le champ Genre doit être soit "F" ou "M".',
            'role.required' => 'Le champ role est obligatoire.',
            'role.in' => 'Le champ role doit être soit "admin" ou "prof".',
            // 'date_naissance.required' => 'Le champ Date de naissance est obligatoire.',
            // 'date_naissance.date' => 'Le champ Date de naissance doit être une date valide.',
            // 'salaire.required' => 'Le champ Salaire est obligatoire.',
            // 'salaire.numeric' => 'Le champ Salaire doit être un nombre.',
            // 'salaire.min' => 'Le champ Salaire doit être d\'au moins 3000.',
        ];
    }
}