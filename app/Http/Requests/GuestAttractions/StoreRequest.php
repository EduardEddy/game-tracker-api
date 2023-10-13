<?php

namespace App\Http\Requests\GuestAttractions;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'price_attraction_id' => 'required|exists:price_attractions,id',
            'entry_time' => 'required|string'
        ];
    }


    public function messages()
    {
        return [
            'price_attraction_id.required' => 'El campo  es requerido',
            'price_attraction_id.exists' => 'El id es invalido',
            'entry_time.required' => 'La hora es requerida',
            'entry_time.string' => 'La hora es invalida',
        ];
    }
}
