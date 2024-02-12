// src/store/modules/alert.js
import { defineStore } from 'pinia'

export const useCameraActionStore = defineStore('cameraActionStore', {
    state: () => ({
    dialog: false,
    detail:[]
    }),
    actions: {
    toggleDialog() {
        this.dialog = !this.dialog
        this.detail = ''
    },
    async fetchDetail(id){
        const response = await axios.get('/detail_presensi/'+ id +'/detail')
        this.detail = response.data.detail_presensi.foto_presensi
        console.log(response.data.detail_presensi)
        console.log(response.data.detail_presensi.foto_presensi)

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
