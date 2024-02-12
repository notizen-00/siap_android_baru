<template>
    <v-btn class="" @click="device" icon="fas fa-mobile" size="5">
    </v-btn>
    <v-btn class="ml-5" icon="fas fa-location-dot" @click="lokasi" color="green" variant="outline" size="5">
    </v-btn>
    <v-btn class="ml-5" icon="far fa-calendar" size="5">
    </v-btn>
    <v-btn class="ml-6" icon="far fa-sticky-note" size="5">
    </v-btn>
    <v-btn class="ml-6" icon="fas fa-camera" @click="camera" size="5">
    </v-btn>
    <v-btn class="ml-6" icon="fas fa-pen-to-square" size="5">
    </v-btn>
    
    <lokasiDialog></lokasiDialog>
    <perangkatDialog></perangkatDialog>
    <kameraDialog></kameraDialog>
</template>
<script setup>
    import {ref,inject} from 'vue'
    import lokasiDialog from '@/Components/Kehadiran/Dialog/Lokasi.vue'
    import perangkatDialog from '@/Components/Kehadiran/Dialog/Perangkat.vue'
    import kameraDialog from '@/Components/Kehadiran/Dialog/Kamera.vue'
    const store = inject('store')

    const props = defineProps({
        idAction:Number
    })

    const lokasi = () =>{
        store.lokasiActionStore.toggleDialog();

    }

    const device = () => {
        store.perangkatActionStore.fetchDetail(props.idAction);
        store.perangkatActionStore.toggleDialog();
        
    }

    const camera = () => {
        store.cameraActionStore.fetchDetail(props.idAction);
        store.cameraActionStore.toggleDialog();
        
    }

</script>