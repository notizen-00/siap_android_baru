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
            image="/img/profil-default.jpg"
            size="50"
            >
            </v-avatar>
            
            <div>
            <span class="font-bold">  
            {{ item.raw.nama_karyawan }} </span><br>
            <v-chip>{{ item.raw.divisi.nama_divisi }}</v-chip>
            </div>
            </div>
          </td>
          <td>
            {{ item.raw.user.email }} <br>
            {{ item.raw.no_hp }}
          </td>
          <td>-</td>
          <td><v-btn icon="fas fa-cog" size="small"></v-btn></td>
          <td>-</td>
          <td><v-btn icon="fas fa-edit" size="small"></v-btn></td>
        </tr>
      </template>
    </v-data-table>
    
  </template>
  <script setup>
  import { ref } from 'vue';
  
 const props = defineProps({
    search:String,
    listData:Object
  })

  const headers = [
    {
      title: 'Nama',
      align: 'center',
      sortable: false,
      key: 'nama_karyawan',
    },
    { title: 'Email & No Telepon',
        align:'center',
        key: 'id' },
    { title: 'identitas', key: 'jumlah' },
    { title: 'Sisa Cuti', key: 'sisa_cuti' },
    { title: 'Dokumen', key: 'dokumen' },
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