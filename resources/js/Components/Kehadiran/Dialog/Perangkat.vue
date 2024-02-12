<template>
    
    <v-dialog
    v-model="store.perangkatActionStore.isDialogActive"
    persistent
    width="auto"
    >
    <v-card>
        <v-card-text class="w-full text-center font-sans">
        <span class="text-h5 text-center mx-auto">Perangkat</span>
        </v-card-text>
        <v-card-item>
            <v-table>
                <thead>
                    <tr>
                    <th class="text-left">
                        Manufaktur
                    </th>
                    <th class="text-left">
                        Model
                    </th>
                    <th class="text-left">
                        Device Id
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                    >
                    <td>{{ getDetail.manufacturer }}</td>
                    <td>{{ getDetail.model }}</td>
                    <td>{{ getDetail.id }}</td>
                    </tr>
                </tbody>
                </v-table>
        </v-card-item>
        <v-card-actions>
        <v-btn color="primary" block @click="store.perangkatActionStore.toggleDialog()">Tutup</v-btn>
        </v-card-actions>
    </v-card>
    </v-dialog>

</template>
<script setup>
    import {inject} from 'vue'
    import { storeToRefs } from 'pinia';
    const store = inject('store')
    const {getDetail} = storeToRefs(store.perangkatActionStore);
    

</script>
