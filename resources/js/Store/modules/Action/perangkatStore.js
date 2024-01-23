// src/store/modules/alert.js
import { defineStore } from 'pinia'

export const usePerangkatActionStore = defineStore('perangkatActionStore', {
    state: () => ({
    dialog: true,
    detail:[]
    }),
    actions: {
    toggleDialog() {
        this.dialog = !this.dialog
    },
    fetchDetail(){
        
    }
    },
    getters: {
    isDialogActive() {
        return this.dialog
    },
    getDetail(){
        return this.detail
    }
    }
})
