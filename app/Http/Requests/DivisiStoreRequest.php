<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisiStoreRequest extends FormRequest
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
            'nama_divisi'=>'required',
            'sistem_kerja'=>'required',
            'pola_kerja'=>'required_if:sistem_kerja,1',
            'validasi_perangkat'=>'nullable',
            'masuk_presensi_sebelum'=>'nullable',
            'masuk_presensi_setelah'=>'nullable',
            'keluar_presensi'=>'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute harus diisi.',
            'unique' => ':Attribute sudah ada dalam database.',
            'max' => ':Attribute maksimal 255 karakter.',
            'nullable' => ':Attribute harus berupa angka (toleransi_keterlambatan), teks (catatan), atau kode warna (warna).',
            'time' => ':Attribute harus berupa waktu yang tepat',
            
        ];
    }
}
