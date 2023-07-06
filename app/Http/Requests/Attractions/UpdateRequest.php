<?php

namespace App\Http\Requests\Attractions;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'price' => 'numeric',
            'price15' => 'numeric',
            'price30' => 'numeric',
            'price60' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            //'name.required' => 'El campo nombre es requerido',
            //'name.string' => 'El campo nombre es inválido',
            'price.numeric' => 'El campo precio es inválido',
            'price15.numeric' => 'El campo precio es inválido',
            'price30.numeric' => 'El campo precio es inválido',
            'price60.numeric' => 'El campo precio es inválido',
            //'name.numeric' => 'El campo precio es inválido',
        ];
    }
}
