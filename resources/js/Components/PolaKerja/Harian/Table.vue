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
          <td>{{ item.raw.deskripsi }}  </td>
          <td>{{ item.raw.toleransi_keterlambatan }} Menit</td>
          <td><v-btn>Test</v-btn></td>
         
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
    { title: 'Pola Kerja', key: 'id' },
    { title: 'Toleransi Keterlambatan', key: 'toleransi_keterlambatan' },
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