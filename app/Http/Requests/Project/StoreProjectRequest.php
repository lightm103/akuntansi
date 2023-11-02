<?php

namespace App\Http\Requests\Project;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'uang_muka' => 'required|numeric',
            'uang_pinjaman' => 'required|numeric'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'name.string' => 'Kolom nama harus berupa teks.',
            'name.max' => 'Kolom nama tidak boleh lebih dari :max karakter.',
            'uang_muka.required' => 'Kolom uang muka harus diisi.',
            'uang_muka.numeric' => 'Kolom uang muka harus berupa angka.',
            'uang_pinjaman.required' => 'Kolom uang pinjaman harus diisi.',
            'uang_pinjaman.numeric' => 'Kolom uang pinjaman harus berupa angka.',
        ];
    }
}
