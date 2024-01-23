<template>
    
    <v-dialog
    v-model="store.lokasiActionStore.isDialogActive"
    persistent
    width="auto"
    >
    <v-card>
        <v-card-text>
        Lokasi Store
        </v-card-text>
        <v-card-actions>
        <v-btn color="primary" block @click="store.lokasiActionStore.toggleDialog()">Tutup Dialog</v-btn>
        </v-card-actions>
    </v-card>
    </v-dialog>

</template>
<script setup>
    import {inject} from 'vue'
    const store = inject('store')


</script>
