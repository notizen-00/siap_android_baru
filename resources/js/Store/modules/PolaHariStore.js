// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const usePolaHariStores = defineStore('polaHariStore', {
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
