<?php

namespace App\Http\Requests\Collaborator;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'last_name.required' => 'El campo apellido es obligatorios',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El email ingresado es inválido',
            'email.unique' => 'El email ingresao ya se encuentra registrado',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'La contraseña son diferentes',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres'
        ];
    }
}
