<template>
    <v-data-table
      :headers="headers"
      :items="listData"
      :search="search"
      item-value="name"
      class="elevation-1 custom-table"
    >
        <template v-slot:item="{ item }">
        <tr>
            <td>
            <div class="d-flex justify-start">
            <v-avatar
            class="m-2"
            :image="item.raw.profile_photo_path ?  item.raw.profile_photo_path : item.raw.user.profile_photo_url"
            size="50"
            >
            </v-avatar>
            
            <div>
            <span class="font-bold mt-10">  
            {{ item.raw.nama_karyawan }} </span><br>
            <v-chip size="small" class="mt-3 text-xs">{{ item.raw.divisi.nama_divisi }}</v-chip>
            </div>
            </div>
            </td>
            <td class="text-center">
                <div class="d-flex justify-center w-full mt-4" v-if="item.raw.presensi_today">
                  <Action :idAction="item.raw.presensi_today.id"></Action>
                  <!-- {{ item.raw.presensi_today.id }} -->
                </div>
                <span v-else>Tidak Hadir / Belum Absen</span>
                <br>
                <div class="mb-4 mt-3">
                <span class="font-bold text-5xl">{{ item.raw.presensi_today ? item.raw.presensi_today.jam_presensi : '' }}</span>
            </div>
            </td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
  
        </tr>
        </template>
    </v-data-table>
    
  </template>
  <script setup>
  import { ref } from 'vue';
  import Action from '@/Components/Kehadiran/Action.vue'
 const props = defineProps({
    search:String,
    listData:Object
  })

  const headers = [
    {
      title: 'Karyawan',
      align: 'center',
      sortable: false,
      key: 'nama_karyawan',
    },
    { title: 'Presensi Masuk',
        align:'center',
        key: 'id' },
    { title: 'Mulai Istirahat', key: 'jumlah' },
    { title: 'Selesai Istirahat', key: 'sisa_cuti' },
    { title: 'Presensi Keluar', key: 'dokumen' },
    ];
</script>
<style scoped>

.v-data-table .v-table__wrapper > table > thead > tr > td,
.v-data-table .v-table__wrapper > table > thead > tr th,
.v-data-table .v-table__wrapper > table tbody > tr > td,
.v-data-table .v-table__wrapper > table tbody > tr th {
    background: none !important;
}

.custom-table tr:nth-child(odd) {

    background: rgba(0, 0, 0, .05);
}
</style>