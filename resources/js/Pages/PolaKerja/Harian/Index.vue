<template>
    <AdminLayout>
        <template #header>
            <span class="text-h5 ml-3">Hari Kerja</span>
        </template>
        <template #breadcrumbs>
            <v-breadcrumbs bg-color="primary" class="mt-3" :items="[{title:'Dashboard',href:'/dashboard',disabled:false}, 'Pola Kerja', 'Harian']"></v-breadcrumbs>
        </template>
        <template #content>

          
            <v-card>
                <v-card-item>
                    <v-card-title>
                        Pola Kerja - Hari Kerja
                        <div class="mt-5 mb-3 d-flex justify-between">
                            <input type="text" v-model="search" class="mt-1 px-3 py-2 ml-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="search" />
                        
                            <v-btn
                                prepend-icon="fas fa-plus"
                                color="primary"
                                class="ml-10"
                                @click="store.polaHariStore.toggleSheet()"
                            >
                            <span class="text-capitalize">Tambah Pola Kerja</span>
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
                      @click="store.polaHariStore.toggleSheet()"
                    >
                      close
                    </v-btn>
          
                    <br>
                    <br>
          
                    <FormAdd/>
                  </v-card-text>
                </v-card>
              </v-bottom-sheet>
        
        </template>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Table from '@/Components/PolaKerja/Harian/Table.vue'
import FormAdd from '@/Components/PolaKerja/Harian/FormAdd.vue'
import SnackBar from '@/Components/SnackBar.vue';
import { ref,inject } from 'vue'
import { storeToRefs } from "pinia";
import {usePage} from '@inertiajs/vue3'
const store = inject('store')

console.log(store)
const { isSheetActive } = storeToRefs(store.polaHariStore);


const page = usePage();
const props = defineProps({
    listData:Object
})
// console.log(page.props);

console.log(props.listData);

const search = ref('')
const alert = ref(false)


</script>


