<?php

namespace App\Http\Requests\PemesanBus;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesanBusRequest extends FormRequest
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
            'nama_pemesan' => 'required',
            'tanggal_berangkat' => 'required|date',
            'tanggal_pulang' => 'nullable|date',
            'biaya_sewa' => 'required|string',
            'biaya_dp' => 'string',
            'tujuan' => 'required',
            'no_telp' => 'required',
            'alamat_jemput' => 'string',
            'standby' => '',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nama_pemesan.required' => 'Kolom Nama Pemesan harus diisi.',
            'no_telp.required' => 'Kolom No. Telepon harus diisi.',
            'tanggal_berangkat.required' => 'Kolom Tanggal Berangkat harus diisi.',
            'tanggal_berangkat.date' => 'Kolom Tanggal Berangkat harus berupa tanggal.',
            'tanggal_pulang.date' => 'Kolom Tanggal Pulang harus berupa tanggal.',
            'biaya_sewa.required' => 'Kolom Biaya Sewa harus diisi.',
            'biaya_sewa.numeric' => 'Kolom Biaya Sewa harus berupa angka.',
            'biaya_dp.numeric' => 'Kolom Biaya DP harus berupa angka.',
            'tujuan.required' => 'Kolom Tujuan harus diisi.',
            'alamat_jemput.string' => 'Kolom Alamat Jemput harus berupa teks.',
        ];
    }


}
