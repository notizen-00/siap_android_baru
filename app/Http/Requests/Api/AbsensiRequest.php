<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiRequest extends FormRequest
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
            'lokasi_penugasan'=>'required|array',
            'lokasi_karyawan'=>'required|array',
            'lokasi_penugasan.*'=>'required',
            'lokasi_karyawan.*'=>'required',
            'radius'=>'integer|required',
            'karyawan_id'=>'integer|required',
            'device_id'=>'required|min:3',
            'device'=>'required|array'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute Anda Kosong Wajib Di Isi.',
            'unique' => ':Attribute sudah ada dalam database.',
            'max' => ':Attribute maksimal 255 karakter.',
            'nullable' => ':Attribute harus berupa angka (toleransi_keterlambatan), teks (catatan), atau kode warna (warna).',
            'time' => ':Attribute harus berupa waktu yang tepat',

            
        ];
    }

    public function validatedLokasi()
    {
        return $this->only(['lokasi_karyawan', 'lokasi_penugasan', 'radius']);
    }
}
