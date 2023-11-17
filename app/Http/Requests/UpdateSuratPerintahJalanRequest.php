<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratPerintahJalanRequest extends FormRequest
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
            'biaya_driver1' => 'required|numeric',
            'biaya_driver2' => 'nullable|numeric',
            'biaya_codriver' => 'nullable|numeric',
            'biaya_solar' => 'nullable|numeric',
            'biaya_lainnya' => 'nullable|numeric',
        ];
    }
}
