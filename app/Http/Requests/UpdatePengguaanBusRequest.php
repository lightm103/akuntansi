<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengguaanBusRequest extends FormRequest
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
            'armada_id' => 'required',
            'driver1' => 'required',
            'driver2' => 'string',
            'co_driver' => 'string',
        ];
    }

    /**
     * Get the validation messages for the defined rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'armada_id.required' => 'Armada wajib diisi',
            'driver1.required' => 'Driver 1 wajib diisi',
            'driver2.string' => 'Driver 2 harus berupa string',
            'co_driver.string' => 'Co-driver harus berupa string',
        ];
    }
}
