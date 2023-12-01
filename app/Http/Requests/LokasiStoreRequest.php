<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LokasiStoreRequest extends FormRequest
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
            'nama_lokasi'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'radius_lokasi'=>'required|integer',
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
