<?php
  
namespace App\Http\Resources;
  
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
  
class KaryawanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array

     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_karyawan' => $this->nama_karyawan,
            'jabatan' => $this->jabatan,
            'created_at' => $this->created_at->format('d/m/Y'),
            
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}