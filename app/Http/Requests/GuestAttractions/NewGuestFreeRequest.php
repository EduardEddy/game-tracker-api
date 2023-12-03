<?php

namespace App\Http\Requests\GuestAttractions;

use Illuminate\Foundation\Http\FormRequest;

class NewGuestFreeRequest extends FormRequest
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
            'entry_time' => 'required|string',
            'guest_id' => 'required|exists:guests,id',
            'price_attraction_id' => 'required|exists:price_attractions,id',
        ];
    }

    public function messages()
    {
        return [
            'guest_id.required' => 'El usuario es requerido',
            'guest_id.exists' => 'El id es invalido',
            'entry_time.required' => 'La hora es requerida',
            'entry_time.string' => 'La hora es invalida',
            'price_attraction_id.required' => 'La hora es requerida',
            'price_attraction_id.exists' => 'La hora es invalida',
        ];
    }
}
