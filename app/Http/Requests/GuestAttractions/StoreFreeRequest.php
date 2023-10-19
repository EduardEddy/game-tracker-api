<?php

namespace App\Http\Requests\GuestAttractions;

use Illuminate\Foundation\Http\FormRequest;

class StoreFreeRequest extends FormRequest
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
            'entry_time' => 'required|string'
        ];
    }


    public function messages()
    {
        return [
            'entry_time.required' => 'La hora es requerida',
            'entry_time.string' => 'La hora es invalida',
        ];
    }
}
