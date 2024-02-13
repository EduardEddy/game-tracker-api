<?php

namespace App\Http\Requests\Collaborator;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $collaborator = $this->route('collaborator'); // Obtener el ID del colaborador de la ruta
        
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$collaborator->id,
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'last_name.required' => 'El campo apellido es obligatorios',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El email ingresado es inválido',
            'email.unique' => 'El email ingresao ya se encuentra registrado'
        ];
    }
}
