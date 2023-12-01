// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const usePolaShiftStores = defineStore('polaShiftStore', {
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
