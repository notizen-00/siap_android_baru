<template>
    <AdminLayout>
        <template #header>
            <span class="text-h5 ml-3">Karyawan</span>
        </template>
        <template #breadcrumbs>
            <v-breadcrumbs bg-color="primary" class="mt-3" :items="[{title:'Dashboard',href:'/dashboard',disabled:false}, 'Kelola Karyawan', 'Karyawan']"></v-breadcrumbs>
        </template>
        <template #content>

          
            <v-card>
                <v-card-item>
                    <v-card-title>
                        Kelola Karyawan - Karyawan
                        <div class="mt-5 mb-3 d-flex justify-between">
                            <div class="d-flex w-full">
                            <select class="w-1/6 mt-1 px-3 py-2 ml-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1">
                                <option value="">-- Divisi --</option>
                            </select>
                            <input type="text" v-model="search" class="mt-1 w-1/6 px-3 py-2 ml-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="search" />
                            </div>
                            <v-btn
                                prepend-icon="fas fa-plus"
                                color="primary"
                                class="ml-10"
                                @click="store.karyawanStore.toggleSheet()"
                            >
                            <span class="text-capitalize">Tambah Karyawan</span>
                            </v-btn>
                        </div> 
                    </v-card-title>
                    <v-card-subtitle>
                        
                    </v-card-subtitle>
                </v-card-item>
                <v-card-text>
                    <Table :search="search" :listData="listData" />
                </v-card-text>
                
            </v-card>

            <v-bottom-sheet v-model="isSheetActive">
                <v-card
                  class="text-center"
                  height="100%"
                >
                  <v-card-text>
                    <div class="d-flex justify-between">
                    <span class="text-primary text-h4">Tambah karyawan</span>
                    <v-btn
                      variant="text"
                      @click="store.karyawanStore.toggleSheet()"
                    >
                      close
                    </v-btn>
                    </div>
          
                    <br>
                    <br>
          
                    <FormAdd :listItem='listItem' :listDivisi="listDivisi"/>
                  </v-card-text>
                </v-card>
              </v-bottom-sheet>
        
        </template>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Table from '@/Components/Karyawan/Table.vue'
import FormAdd from '@/Components/Karyawan/FormAdd.vue'
import SnackBar from '@/Components/SnackBar.vue';
import { ref,inject } from 'vue'
import { storeToRefs } from "pinia";
import {usePage} from '@inertiajs/vue3'
const store = inject('store')

const { isSheetActive } = storeToRefs(store.karyawanStore);


const page = usePage();
const props = defineProps({
    listItem:Object,
    listData:Object,
    listDivisi:Object
})



const search = ref('')
const alert = ref(false)


</script>


