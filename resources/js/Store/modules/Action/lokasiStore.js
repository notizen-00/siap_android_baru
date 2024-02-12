// src/store/modules/alert.js
import { defineStore } from 'pinia'

export const useLokasiActionStore = defineStore('lokasiActionStore', {
    state: () => ({
    dialog: false,
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
