<template>
    
    <v-dialog
    v-model="store.cameraActionStore.isDialogActive"
    persistent
    width="auto"
    >
    <v-card>
        <v-card-text class="w-full text-center font-bold font-sans">
        <span class="text-h5 text-center mx-auto">Foto Presensi</span>
        </v-card-text>
        <v-card-item>
            <v-img width="200" :src="'storage/'+getDetail"></v-img>
        </v-card-item>
        <v-card-actions>
        <v-btn color="primary" block @click="store.cameraActionStore.toggleDialog()">Tutup</v-btn>
        </v-card-actions>
    </v-card>
    </v-dialog>

</template>
<script setup>
    import {inject} from 'vue'
    import { storeToRefs } from 'pinia';
    const store = inject('store')
    const {getDetail} = storeToRefs(store.cameraActionStore);
    

</script>
