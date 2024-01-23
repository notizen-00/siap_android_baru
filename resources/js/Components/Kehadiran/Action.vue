<template>
    <v-btn class="" @click="device" icon="fas fa-mobile" size="5">
    </v-btn>
    <v-btn class="ml-5" icon="fas fa-location-dot" @click="lokasi" color="green" variant="outline" size="5">
    </v-btn>
    <v-btn class="ml-5" icon="far fa-calendar" size="5">
    </v-btn>
    <v-btn class="ml-6" icon="far fa-sticky-note" size="5">
    </v-btn>
    <v-btn class="ml-6" icon="fas fa-camera" size="5">
    </v-btn>
    <v-btn class="ml-6" icon="fas fa-pen-to-square" size="5">
    </v-btn>
    
    <lokasiDialog></lokasiDialog>
    <perangkatDialog></perangkatDialog>
</template>
<script setup>
    import {ref,inject} from 'vue'
    import lokasiDialog from '@/Components/Kehadiran/Dialog/Lokasi.vue'
    import perangkatDialog from '@/Components/Kehadiran/Dialog/Perangkat.vue'
    const store = inject('store')

    const props = defineProps({
        idAction:Number
    })

    const lokasi = () =>{
        store.lokasiActionStore.toggleDialog();
    }

    const device = () => {
        store.perangkatActionStore.toggleDialog();
    }

</script>