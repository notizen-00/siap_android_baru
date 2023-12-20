<template>
    <AdminLayout>
        <template #header>
            <span class="text-h5 ml-3">Lokasi Kehadiran</span>
        </template>
        <template #breadcrumbs>
            <v-breadcrumbs bg-color="primary" class="mt-3" :items="[{title:'Dashboard',href:'/dashboard',disabled:false}, 'Kelola Karyawan', 'Lokasi Kehadiran']"></v-breadcrumbs>
        </template>
        <template #content>

        
            <v-card>
                <v-card-item>
                    <v-card-title>
                        Kelola Karyawan - Lokasi Kehadiran
                        <div class="mt-5 mb-3 d-flex justify-between">
                            <input type="text" v-model="search" class="mt-1 px-3 py-2 ml-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="search" />
                        
                            <v-btn
                                prepend-icon="fas fa-plus"
                                color="primary"
                                class="ml-10"
                                @click="store.lokasiStore.toggleSheet()"
                            >
                            <span class="text-capitalize">Tambah Lokasi</span>
                            </v-btn>
                        </div> 
                    </v-card-title>
                    <v-card-subtitle>
                        
                    </v-card-subtitle>
                </v-card-item>
                <v-card-text>
                    <Table :search="search" :listData="listData"/>
                </v-card-text>
                
            </v-card>

            <v-bottom-sheet v-model="isSheetActive">
                <v-card
                  class="text-center"
                  height="100%"
                >
                  <v-card-text>
                    <v-btn
                      variant="text"
                      @click="store.lokasiStore.toggleSheet()"
                    >
                      close
                    </v-btn>
          
                    <br>
                    <br>
          
                    <FormAdd/>
                  </v-card-text>
                </v-card>
              </v-bottom-sheet>

              <v-bottom-sheet v-model="isEditSheetActive">
                <v-card
                  class="text-center"
                  height="100%"
                >
                  <v-card-text>
                    <v-btn
                      variant="text"
                      @click="store.lokasiStore.toggleEditSheet()"
                    >
                      close
                    </v-btn>
          
                    <br>
                    <br>
          
                    <FormEdit />
                  </v-card-text>
                </v-card>
              </v-bottom-sheet>

              <v-bottom-sheet v-model="isPenugasanSheetActive">
                <v-card
                  class="text-center"
                  height="100%"
                >
                  <v-card-text>
                    <v-btn
                      variant="text"
                      @click="store.lokasiStore.togglePenugasanSheet()"
                    >
                      close
                    </v-btn>
          
                    <br>
                    <br>
          
                    <FormPenugasan :listKaryawanPenugasan="listPenugasan"  />
                  </v-card-text>
                </v-card>
              </v-bottom-sheet>
        
        </template>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Table from '@/Components/Lokasi/Table.vue'
import FormAdd from '@/Components/Lokasi/FormAdd.vue'
import FormEdit from '@/Components/Lokasi/FormEdit.vue'
import FormPenugasan from '@/Components/Lokasi/FormEditPenugasan.vue'
import SnackBar from '@/Components/SnackBar.vue';
import { ref,inject,reactive,onMounted } from 'vue'
import { storeToRefs } from "pinia";
import {usePage} from '@inertiajs/vue3'
const store = inject('store')

const { isSheetActive,isEditSheetActive,isPenugasanSheetActive } = storeToRefs(store.lokasiStore);


const page = usePage();
const props = defineProps({
    listData:Object,
    listPenugasan:Object,
})



const search = ref('')
const alert = ref(false)

onMounted(()=>{
  store.karyawanStore.fetchKaryawan()
})


</script>


