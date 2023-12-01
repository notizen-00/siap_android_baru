<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolaHarianStoreRequest extends FormRequest
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
            'nama_polakerja' => 'required|unique:polashift|max:255',
            'toleransi_keterlambatan' => 'nullable',
            'pola_kerja' => 'required',
            'hari'=>'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'mulai_istirahat' => 'nullable',
            'selesai_istirahat' => 'nullable',
            'maks_istirahat'=>'nullable'
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
