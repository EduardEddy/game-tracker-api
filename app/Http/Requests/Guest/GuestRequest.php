<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'child_fullname' => 'required|string|min:3',
            'child_description' => 'string',
            'parent_fullname' => 'required|string|min:5',
            'cellphone' => 'required|numeric|digits_between:9,11'
        ];
    }

    public function messages()
    {
        return [
            'child_fullname.required'=>'El nombre del niño es requerido',
            'child_fullname.string'=>'El nombre es invalido',
            'child_fullname.min'=>'El nombre debe tener al menos 3 caracteres',
            'child_description.string' => 'La descripcion es inválida',
            'parent_fullname.required' => 'El nombre del representante es requerida',
            'parent_fullname.string' => 'El nombre del representante es inválido',
            'parent_fullname.min' => 'El nombre del representante debe tener al menos 5 caracteres',
            'cellphone.required' => 'El numero de telf es requerido',
            'cellphone.numeric' => 'El numero de telf debe ser numeríco',
            'cellphone.digits_between' => 'El numero de telf debe tener 10 número'
        ];
    }
}
