// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const useOverlayStores = defineStore('overlayStore', {
  state: () => ({
    overlay: false,
    overlayProduct: false,
    editProduct: false,
  }),
  actions: {
    toggleOverlay() {
      this.overlay = !this.overlay
    },
    toggleOverlayProduct() {
      this.overlayProduct = !this.overlayProduct
    },
    toggleEditProduct(){
      this.editProduct = !this.editProduct
    },

  },
  getters: {
    isOverlayActive() {
      return this.overlay
    },
    isOverlayProductActive() {
      return this.overlayProduct
    },
    isEditProductActive() {
      return this.editProduct
    }
  }
})
