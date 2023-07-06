<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|numeric|min:10',
            'park_name' => 'required'
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
            'password.confirm' => 'La contraseña son diferentes',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            'phone.numeric' => 'El telefono debe ser solo numeros',
            'phone.required' => 'El telefono es requerido',
            'phone.min' => 'El telefono debe tener al menos 10 números',
            'password.confirmed' => 'La contraseña son diferentes',
            'park_name.required' => 'El nombre del parque es requerido' 
        ];
    }
}
