<?php

namespace App\Services;

class PolaHarianService
{
    public function normalizeData($data,$polahari_id)
    {
        foreach ($data['hari'] as $index => $hari) {
            $normalizedData[$index] = [
                'polahari_id'=>$polahari_id,
                'hari' => isset($data['hari'][$index]) ? $data['hari'][$index] : null,
                'pola_kerja' => isset($data['pola_kerja'][$index]) ? $data['pola_kerja'][$index] : null,
                'jam_masuk' => isset($data['jam_masuk'][$index]) ? $data['jam_masuk'][$index] : null,
                'jam_keluar' => isset($data['jam_keluar'][$index]) ? $data['jam_keluar'][$index] : null,
                'mulai_istirahat' => isset($data['mulai_istirahat'][$index]) ? $data['mulai_istirahat'][$index] : null,
                'selesai_istirahat' => isset($data['selesai_istirahat'][$index]) ? $data['selesai_istirahat'][$index] : null,
                'maks_istirahat' => isset($data['maks_istirahat'][$index]) ? $data['maks_istirahat'][$index] : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $normalizedData;
    }

    public function PolaKerjaHarian($id)
    {
        $jumlah_kerja = JadwalHarian::where('polahari_id',$id)->where('pola_kerja','Hari Libur')->count();
        $jumlah_libur = JadwalHarian::where('polahari_id',$id)->where('pola_kerja','Jadwal Libur')->count();
      
        return $data;
    }
}
