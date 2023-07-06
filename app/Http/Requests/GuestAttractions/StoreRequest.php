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
            'guest_id' => 'required|exists:guests,id',
            'price_attraction_id' => 'required|exists:price_attractions,id',
            'entry_time' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'guest_id.required' => 'El niño es requerido',
            'guest_id.exists' => 'El id es invalido',
            'price_attraction_id.required' => 'El campo  es requerido',
            'price_attraction_id.exists' => 'El id es invalido',
            'entry_time.required' => 'El campo  es requerido',
        ];
    }
}
