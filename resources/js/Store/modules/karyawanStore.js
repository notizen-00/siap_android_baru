// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const useKaryawanStore = defineStore('karyawanStore', {
  state: () => ({
    sheet: false,
    listKaryawan:[]
  }),
  actions: {
    toggleSheet() {
      this.sheet = !this.sheet
    },
    async fetchKaryawan()
    {
        const response = await axios.get('/kelola_karyawan/ajax/karyawan')
        this.listKaryawan = response.data
    }

  },
  getters: {
    isSheetActive() {
      return this.sheet
    },
    getKaryawan(){
      return this.listKaryawan
    }
  }
})
