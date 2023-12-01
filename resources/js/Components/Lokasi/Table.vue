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
          <td>{{ item.raw.nama_lokasi }}</td>
          <td>{{ item.raw.radius_lokasi }}  </td>
          <td>
            <v-list lines="one">
              <v-list-item
                v-for="n in 3"
                :key="n"
                :title="'Item ' + n"
                subtitle="Lorem ipsum dolor sit amet consectetur adipisicing elit"
             
              ></v-list-item>
            </v-list>
          </td>
          <td><v-btn icon="fas fa-edit" size="5" @click.prevent="store.lokasiStore.editForm(item.raw.id)"></v-btn></td>
         
        </tr>
      </template>
    </v-data-table>
    
  </template>
  <script setup>
  import { ref,inject } from 'vue';
  const store = inject('store')
  defineProps({
    search:String,
    listData:Object
  })

  const headers = [
    {
      title: 'Nama Lokasi',
      align: 'center',
      sortable: false,
      key: 'nama_lokasi',
    },
    { title: 'Radius(Meter)', key: 'id' },
    { title: 'Karyawan Ditugaskan', key: 'toleransi_keterlambatan' },
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