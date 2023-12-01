<template>
    <v-container fluid>
        <form @submit.prevent="submit">
            <v-row>
                <v-col cols="3">
                    <InputLabel for="nama_divisi" class="mt-5 text-start">
                        Nama Divisi <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <TextInput id="nama_divisi" v-model="form.nama_divisi" class="mt-1 block w-full"
                        autofocus autocomplete="nama_divisi" />
                    <InputError class="mt-2" :message="form.errors.nama_divisi" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Sistem Kerja <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                    <label class="mr-2" for="hari_kerja">Hari Kerja</label>
                    <input type="radio" id="hari_kerja" v-model="form.sistem_kerja" value="1" checked class="border-2 border-red bg-primary mr-10"/>
                    <label class="mr-2" for="shift">Shift</label>
                    <input type="radio" id="shift" v-model="form.sistem_kerja" value="2" class="bg-primary" />
                    </div>
                    <InputError class="mt-2" :message="form.errors.sistem_kerja" />
                </v-col>
            </v-row>
         
            <v-row>
                <v-col cols="3">
                
                </v-col>
                <v-col cols="9">
                    <!-- <v-select
  chips

  label="Select"
  v-model="form.pola_kerja"
  class="text-slate-400"
  :items="listItem"
  
  variant="outlined"
></v-select> -->

<v-select
    v-model="form.pola_kerja"
    v-if="form.sistem_kerja === '1'"
    :items="listItem"
    item-title="nama_polakerja"
    item-value="id"
    density="comfortable"
    label="-- Pilih Polakerja --"
    @change="detail_polakerja"
    return-object
    color="primary"
    :clearable="true"
  ></v-select>
                    <v-table height="450px" v-if="form.pola_kerja !== '' && form.sistem_kerja !== '2'">
                        <thead>
                            <tr >
                                <th class="text-left font-bold">
                                    Hari
                                </th>
                                <th class="text-left font-bold">
                                    Pola Kerja
                                </th>
                                <th class="text-left font-bold">
                                    Jam Masuk
                                </th>
                                <th class="text-left">
                                    Jam Keluar
                                </th>
                                <th class="text-left">
                                    Mulai Istirahat
                                </th>
                                <th class="text-left">
                                    Selesai Istirahat
                                </th>
                                <th class="text-center" style="width:10%">
                                    Maks Menit Istirahat
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="x in form.pola_kerja.jadwal_harian" :class="x.pola_kerja === 'Jadwal Libur' ? 'bg-yellow-lighten-3':''" :key="x">
                                <td> {{ x.hari }} </td>
                                <td> {{ x.pola_kerja }} </td>
                                <td> {{ x.jam_masuk }} </td>
                                <td> {{ x.jam_keluar }} </td>
                                <td> {{ x.mulai_istirahat }} </td>
                                <td> {{ x.selesai_istirahat }} </td>
                                <td> {{ x.maks_istirahat }} </td>
                            </tr>
                            <!-- <tr v-for="item in form.pola_kerja" :key="item.id">
                                <td class="text-left mt-10">
                                    
                                    <TextInput class="text-slate-500" :value="item.created_at" />
                                    {{ item }}

                                </td>
                                <td class="text-left mt-10" style="width:20%;">
                                    <span class="test text-slate-400"> {{ item.pola_kerja }} </span>
                                </td>
                               
                            </tr> -->
                        </tbody>
                    </v-table>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                 
                </v-col>
                <v-col cols="9">
                   <v-sheet color="primary" class="p-2 d-flex justify-start">
                    Sistem kerja tidak dapat diubah, harap berhati-hati.    
                   </v-sheet>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="pembatasan_presensi" class="mt-5 text-start">
                        Pembatasan Presensi
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <span class="d-flex justify-start mb-1">#Presensi Masuk</span>
                    <v-divider class="mb-2"></v-divider>
                    <div class="d-flex justify-start">
                    <TextInput class="mr-10" v-model="form.masuk_presensi_sebelum"></TextInput> Menit Sebelum Jadwal Masuk
                    </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                 
                </v-col>

                <v-col cols="9">
                    <span class="d-flex justify-start mb-1">#Presensi Keluar</span>
                    <v-divider class="mb-2"></v-divider>
                    <div class="d-flex justify-start">
                        <TextInput class="mr-10" v-model="form.masuk_presensi_setelah"></TextInput> Menit Setelah Jadwal Masuk
                        </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                 
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput class="mr-10" v-model="form.keluar_presensi"></TextInput> Menit Setelah Jadwal Keluar
                        </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Validasi Perangkat
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <input type="checkbox" value="1" class="d-flex justify-start" v-model="form.validasi_perangkat"/>
                </v-col>
            </v-row>
            <v-row>
                <div class="flex items-center justify-end mt-4 w-full">


                    <PrimaryButton type="submit" @click="color = '#ff00ff'" class="ml-4 bg-primary"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        <i class="fas fa-save mr-2"></i> Simpan Data
                    </PrimaryButton>
                </div>

            </v-row>
        </form>

    </v-container>
</template>
<script setup>
    import {
        Head,
        Link,
        useForm,
        usePage
    } from '@inertiajs/vue3';
    import { ref,inject,onMounted } from 'vue'
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { storeToRefs } from 'pinia'
    const store = inject('store')
    defineProps({
        listItem:Object
    })

    const page = usePage();

    const form = useForm({
        nama_divisi: '',
        sistem_kerja: '1',
        pola_kerja:'',
        validasi_perangkat: '',
        masuk_presensi_sebelum:'',
        masuk_presensi_setelah:'',
        keluar_presensi:''
    });

  

    const submit = () => {
        form.transform(data => ({
            ...data,
            _token: page.props.auth.csrf,
        })).post(route('divisi.store'), {
            onFinish: (data) => {
                store.divisiStore.toggleSheet()
            },
        });
    };

</script>
