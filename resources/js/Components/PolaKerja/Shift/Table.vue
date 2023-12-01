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
          <td>{{ item.raw.nama_polakerja }}</td>
          <td>{{ item.raw.jadwal_shift.jam_masuk }} - {{ item.raw.jadwal_shift.jam_keluar }} </td>
          <td>{{ item.raw.jadwal_shift.mulai_istirahat }} - {{ item.raw.jadwal_shift.selesai_istirahat  }}</td>
          <td><v-btn :color="item.raw.warna"></v-btn></td>
          <td>{{ item.raw.toleransi_keterlambatan }} Menit</td>
          <td>{{ item.raw.catatan }}</td>
          <td><v-btn icon="fas fa-edit" class="mr-2" size="small" color="default"></v-btn><v-btn icon="fas fa-trash" size="small" color="red"></v-btn></td>
        </tr>
      </template>
    </v-data-table>
    
  </template>
  <script setup>
  import { ref } from 'vue';
  
  defineProps({
    search:String,
    listData:Object
  })

  const headers = [
    {
      title: 'Nama Pola Kerja',
      align: 'center',
      sortable: false,
      key: 'nama_polakerja',
    },
    { title: 'Jam Kerja', key: 'jam_masuk' },
    { title: 'Jam Istirahat', key: 'mulai_istirahat' },
    { title: 'Warna', key: 'warna' },
    { title: 'Toleransi Keterlambatan', key: 'toleransi_keterlambatan' },
    { title: 'Catatan', key: 'catatan' },
    { title: 'Aksi', key: 'id' },
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