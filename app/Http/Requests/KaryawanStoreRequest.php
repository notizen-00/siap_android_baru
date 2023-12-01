<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanStoreRequest extends FormRequest
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
            'divisi_id' => 'required|integer',
            'nama_karyawan' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|numeric', 
            'zona_waktu' => 'required',
            'no_identitas' => [
                'nullable'
            ],
            'jenis_identitas' => [
                'nullable'
            ],
            'file_identitas' => 'nullable|mimes:png,jpg,jpeg',
            'foto_profil' => 'nullable|mimes:pdf,png,xls,doc,jpeg,jpg', 
            'tgl_lahir' => 'nullable|date', 
            'tgl_mulai_bekerja' => 'nullable|date', 
            'sisa_cuti' => 'nullable|integer',
            'email' => 'required|unique:users',
            'password' => 'required'
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
