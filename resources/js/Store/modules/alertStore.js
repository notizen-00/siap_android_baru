// src/store/modules/alert.js
import { defineStore } from 'pinia'

export const useAlertStore = defineStore('alertStore', {
  state: () => ({
    alert: true,
  }),
  actions: {
    toggleAlert() {
      
      this.alert = !this.alert

    },

  },
  getters: {
    isAlertActive() {
      return this.alert
    }
  }
})
