<?php

namespace App\Http\Requests\ActiveAccount;

use Illuminate\Foundation\Http\FormRequest;

class ActiveAccountRequest extends FormRequest
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
            'code'=>'required'
        ];
    }

    public function messages() 
    {
        return [
            'code.required' => 'El código es obligatorio',
        ];
    }
}
