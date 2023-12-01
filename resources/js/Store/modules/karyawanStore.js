// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const useKaryawanStore = defineStore('karyawanStore', {
  state: () => ({
    sheet: false,

  }),
  actions: {
    toggleSheet() {
      this.sheet = !this.sheet
    }

  },
  getters: {
    isSheetActive() {
      return this.sheet
    }
  }
})
