<template>

    
    <Alert>
      <template #flash_session>
        {{ $page.props.session.success ? $page.props.session.success : ""}}
      </template>
      
    </Alert>
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
          <td class="text-left">
            <v-btn  color="primary" size="small">
              <template #append>
                <v-icon color="white" size="12">fas fa-users</v-icon>
              </template>
            {{ item.raw.total_karyawan }}
            </v-btn>
          </td>
          <td>
            <v-btn  color="info" size="xsmall" @click.prevent="store.lokasiStore.editForm(item.raw.id)">
              <template #append>
                <v-icon size="15" class="m-1" >fas fa-edit</v-icon>
              </template>
            </v-btn>
            <v-btn color="warning" @click="store.lokasiStore.editFormPenugasan(item.raw.id)" class="ml-3" size="xsmall">
              <template #append>
                <v-icon size="15" class="m-1" >fas fa-bars-staggered</v-icon>
              </template>
            </v-btn>
            <v-btn  class="ml-3" color="red" size="xsmall" @click="deletePost(item.raw.id)">
              <template #append>
                <v-icon size="15" class="m-1" >fas fa-trash</v-icon>
              </template>
            </v-btn>
          
          </td>
        </tr>
      </template>
    </v-data-table>
    
  </template>
  <script setup>
  import { ref,inject } from 'vue';
  import Alert from '@/Components/App/Alert.vue';
  import DialogModal from '@/Components/DialogModal.vue';
  import { router } from '@inertiajs/vue3'
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

  const deletePost = (id) => {
    router.delete(route('lokasi.destroy', id), {preserveScroll: true})

    store.alertStore.toggleAlert();
  }

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