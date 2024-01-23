<template>
    
    <v-dialog
    v-model="store.perangkatActionStore.isDialogActive"
    persistent
    width="auto"
    >
    <v-card>
        <v-card-text>
        Perangkat Store
        </v-card-text>
        <v-card-actions>
        <v-btn color="primary" block @click="store.perangkatActionStore.toggleDialog()">Tutup Dialog</v-btn>
        </v-card-actions>
    </v-card>
    </v-dialog>

</template>
<script setup>
    import {inject} from 'vue'
    const store = inject('store')


</script>
