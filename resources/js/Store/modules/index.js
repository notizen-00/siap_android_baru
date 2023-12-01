// src/store/modules/index.js
import { useOverlayStores } from './overlayStore'
import { usePolaHariStores } from './PolaHariStore'
import { usePolaShiftStores } from './polaShiftStore'
import { useDivisiStores } from './divisiStore'
import { useKaryawanStore } from './karyawanStore'
import { useLokasiStore } from './LokasiStore'

// Impor modul-modul lain jika ada

export function useStore() {
  return {
    overlayStore: useOverlayStores(),
    polaHariStore: usePolaHariStores(),
    polaShiftStore: usePolaShiftStores(),
    divisiStore:useDivisiStores(),
    karyawanStore:useKaryawanStore(),
    lokasiStore:useLokasiStore(),
    // Masukkan modul-modul lain di sini jika ada
  }
}
