<template>
    <div>
      <v-alert
        v-model="isAlertActive"
        border="start"
        variant="tonal"
        closable
        close-label="Close Alert"
        close-icon="fas fa-close"
        color="deep-purple-accent-4"
        title="Notifications"
      >
        <template #close>
            <v-btn icon="fas fa-close" color="red" @click="store.alertStore.toggleAlert()"></v-btn>
        </template>
       <slot name="flash_session">

       </slot>
      </v-alert>
  
    </div>
  </template>

  <script setup>
    import {inject} from 'vue'
    import { storeToRefs } from 'pinia';
    const store = inject('store')

    const{isAlertActive} = storeToRefs(store.alertStore)


  </script>