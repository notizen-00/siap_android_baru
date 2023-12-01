<template>
    <v-navigation-drawer
    v-model="drawer"
    :rail="rail"
    permanent
    @click="rail = false"
  >
    <v-list-item
      prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
      title="Dipta Ikromi M"
      :class="rail ? closeExpand() : 'ml-10 mt-5'"
      nav
    >
      <template v-slot:append>
        <v-btn
          variant="text"
          size="small"
          icon="fas fa-circle-left"
          @click.stop="rail = !rail"
        ></v-btn>
      </template>
    </v-list-item>

    <v-divider class="mt-5 border-blue-900" :thickness="10"></v-divider>

    <v-list  density="compact" class="mt-5" nav>
        <Link href="/dashboard" >
        <v-list-item color="primary" :active="$page.url === '/dashboard'">
        
        <template #prepend>
            <v-icon size="small" :class="rail ? '' : 'ml-2'">fas fa-gauge</v-icon>
        </template>
        <span class="font-semibold text-sm">Dashboard</span>
        
      </v-list-item>
    </Link>
      <v-list-item color="primary" :active="$page.url.startsWith('/kelola_karyawan')"  @click.prevent="expand_karyawan = !expand_karyawan" value="karyawan">
        <template #prepend>
            <v-icon size="small" :class="rail ? '' : 'ml-2'">fas fa-user-group</v-icon>
        </template>
        <template #append>
            <v-icon size="15" >{{ expand_karyawan ? 'fas fa-caret-down' : 'fas fa-caret-right' }}</v-icon>
        </template>
        <span class="font-semibold text-sm">Kelola Karyawan</span>
      </v-list-item>
      <v-expand-transition>
        <v-list density="compact">
            <Link href="/kelola_karyawan/divisi">
        <v-list-item rounded="xl" :active="$page.url === '/kelola_karyawan/divisi'" v-show="expand_karyawan"  value="divisi">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Divisi</span>
        </v-list-item>
        </Link>
        <Link href="/kelola_karyawan/karyawan">
        <v-list-item rounded="xl" :active="$page.url === '/kelola_karyawan/karyawan'" v-show="expand_karyawan"  value="data_karyawan">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Data Karyawan</span>
        </v-list-item>
        </Link>
        <Link href="/kelola_karyawan/lokasi">
        <v-list-item rounded="xl" v-show="expand_karyawan" :active="$page.url === '/kelola_karyawan/lokasi'" value="lokasi_kehadiran">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Lokasi Kehadiran</span>
        </v-list-item>
        </Link>
        <v-list-item rounded="xl" v-show="expand_karyawan"  value="jadwal hari kerja">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Jadwal Hari Kerja</span>
        </v-list-item>
        <v-list-item rounded="xl" v-show="expand_karyawan"  value="jadwal shift">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Jadwal Shift</span>
        </v-list-item>
        </v-list>
      </v-expand-transition>
      <v-list-item color="primary" class="-mt-4"  :active="$page.url.startsWith('/polakerja')"  @click.prevent="expand_polakerja = !expand_polakerja" value="polakerja">
        <template #prepend>
            <v-icon size="small" :class="rail ? '' : 'ml-2'">far fa-clock</v-icon>
        </template>
        <template #append>
            <v-icon size="15" >{{ expand_polakerja ? 'fas fa-caret-down' : 'fas fa-caret-right' }}</v-icon>
        </template>
        <span class="font-semibold text-sm">Pola Kerja</span>
      </v-list-item>
      <v-expand-transition>
        <v-list density="compact">
        <Link href="/polakerja/harian">
        <v-list-item rounded="xl" v-show="expand_polakerja" :active="$page.url === '/polakerja/harian'"  value="polaharian">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Hari Kerja</span>
        </v-list-item>
        </Link>
        <Link href="/polakerja/shift">
        <v-list-item rounded="xl" v-show="expand_polakerja"  :active="$page.url === '/polakerja/shift'" value="polashift">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Shift</span>
        </v-list-item>
        </Link>
        </v-list>
      </v-expand-transition>
      <v-list-item color="primary" class="-mt-4"  @click.prevent="expand_kehadiran = !expand_kehadiran" value="kehadiran">
        <template #prepend>
            <v-icon size="small" :class="rail ? '' : 'ml-2'">fas fa-location-dot</v-icon>
        </template>
        <template #append>
            <v-icon size="15" >{{ expand_kehadiran ? 'fas fa-caret-down' : 'fas fa-caret-right' }}</v-icon>
        </template>
        <span class="font-semibold text-sm">Kehadiran</span>
      </v-list-item>
      <v-expand-transition>
        <v-list density="compact">
        <v-list-item rounded="xl" v-show="expand_kehadiran"  value="kehadiran">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Kehadiran Harian</span>
        </v-list-item>
        <v-list-item rounded="xl" v-show="expand_kehadiran"  value="data_karyawan">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Ringkasan Kehadiran</span>
        </v-list-item>
        <v-list-item rounded="xl" v-show="expand_kehadiran"  value="data_karyawan">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Review Kehadiran</span>
        </v-list-item>
        <v-list-item rounded="xl" v-show="expand_kehadiran"  value="data_karyawan">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Revisi Kehadiran</span>
        </v-list-item>
        
        </v-list>
      </v-expand-transition>
      <v-list-item color="primary" class="-mt-4"  @click.prevent="expand_izin = !expand_izin" value="izin">
        <template #prepend>
            <v-icon size="small" :class="rail ? '' : 'ml-2'">far fa-circle-pause</v-icon>
        </template>
        <template #append>
            <v-icon size="15" >{{ expand_izin ? 'fas fa-caret-down' : 'fas fa-caret-right' }}</v-icon>
        </template>
        <span class="font-semibold text-sm">Izin</span>
      </v-list-item>
      <v-expand-transition>
        <v-list density="compact">
        <v-list-item rounded="xl" v-show="expand_izin"  value="izinhari">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Izin Hari</span>
        </v-list-item>
        <v-list-item rounded="xl" v-show="expand_izin"  value="izinshift">
            <template #prepend>
                <v-icon size="10"  :class="rail ? '' : 'pl-10'">fas fa-minus</v-icon>
            </template>
            <span class="font-semibold text-sm">Izin Shift</span>
        </v-list-item>
        </v-list>
      </v-expand-transition>
    </v-list>
  </v-navigation-drawer>
</template>
<script setup>
import {ref} from 'vue'
import { Link } from '@inertiajs/vue3'
const rail = ref(false)
const expand_karyawan = ref(false)
const expand_polakerja = ref(false)
const expand_kehadiran = ref(false)
const expand_izin = ref(false)
const drawer = ref(true)

const closeExpand = () =>{
    expand_karyawan.value = false
    expand_izin.value = false
    expand_kehadiran.value = false
    expand_polakerja.value = false
}
</script>