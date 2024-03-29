// src/store/modules/alert.js
import { defineStore } from 'pinia'

export const usePerangkatActionStore = defineStore('perangkatActionStore', {
    state: () => ({
    dialog: false,
    detail:[]
    }),
    actions: {
    toggleDialog() {
        this.dialog = !this.dialog
    },
    async fetchDetail(id){
        const response = await axios.get('/detail_presensi/'+ id +'/detail')
        this.detail = response.data.detail_presensi.detail_perangkat
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
