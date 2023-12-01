<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { ref,inject,onMounted } from 'vue'; 
  
  const store = inject('store')
                       
  onMounted(()=>{
  	store.lokasiStore.Maps(); 	 
    store.lokasiStore.Mapss();
  })
  
</script>

<template>
    <AdminLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                Dasbor, Umum & BMN
            </h2>
        </template>

         <template #content> 
            <v-card class="w-full">
                <div class="d-flex justify-between">
                <v-img
                class="w-1/3"
                max-width="450"
                src="/img/hero1.svg"
                >
                </v-img>
                <div class="w-3/4">
                    <p class="text-start p-10">
                        <h1 class="text-h5">Dashboard aplikasi sistem informasi Absensi & Pegawai</h1>
                    </p>
                </div>
                </div>
            </v-card>
        
         </template>
    </AdminLayout>
</template>
