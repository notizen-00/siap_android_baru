// src/store/modules/alert.js
import { defineStore } from 'pinia'

export const useLokasiActionStore = defineStore('lokasiActionStore', {
    state: () => ({
    dialog: true,
    }),
    actions: {
    toggleDialog() {
        this.dialog = !this.dialog
    },
    },
    getters: {
    isDialogActive() {
        return this.dialog
    }
    }
})
