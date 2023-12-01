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
          <td><span class="font-bold">  {{ item.raw.nama_divisi }} </span><br>
             <span :class="item.raw.sistem_kerja == 'Harian' ? 'text-sm':'bg-yellow font-extrabold p-1 rounded-lg text-sm'"> {{ item.raw.sistem_kerja == 'Harian' ? 'Pola Kerja : '+item.raw.pola_hari.nama_polakerja : 'Shift' }}</span>
          </td>
          <td>{{ item.raw.deskripsi }}  </td>
          <td>{{ item.raw.toleransi_keterlambatan }}</td>
          <td><v-btn icon="fas fa-edit" size="small"></v-btn></td>
         
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
      title: 'Nama',
      align: 'center',
      sortable: false,
      key: 'nama_polakerja',
    },
    { title: 'Supervisor', key: 'id' },
    { title: 'Jumlah Karyawan', key: 'jumlah' },
    { title: 'Aksi', key: 'Aksi' },
   
  
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