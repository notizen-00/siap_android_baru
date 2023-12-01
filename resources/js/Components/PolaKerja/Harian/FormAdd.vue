<template>
    <v-container fluid>
        <form @submit.prevent="submit">
            <v-row>
                <v-col cols="3">
                    <InputLabel for="nama_polakerja" class="mt-5 text-start">
                        Nama Pola Kerja <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <TextInput id="nama_polakerja" v-model="form.nama_polakerja" type="text" class="mt-1 block w-full"
                        autofocus autocomplete="nama_polakerja" />
                    <InputError class="mt-2" :message="form.errors.nama_polakerja" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="toleransi_keterlambatan" class="mt-5 text-start">
                        Toleransi Keterlambatan
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-between">
                        <TextInput id="toleransi_keterlambatan" v-model="form.toleransi_keterlambatan" type="number"
                            class="mt-1 block w-full" autofocus autocomplete="nama_polakerja" />
                        <span
                            class="flex items-center whitespace-nowrap rounded-r border border-l-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                            id="basic-addon2">Menit</span>
                    </div>
                    <InputError class="mt-2" :message="form.errors.toleransi_keterlambatan" />
                </v-col>
            </v-row>
         
            <v-row>
                <v-col cols="3">
                    <InputLabel for="warna" class="mt-5 text-start">
                        Jadwal Shift <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <v-table height="450px">
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
                            <tr v-for="(day,index) in daysOfWeek" :key="day" :class="form.pola_kerja[index] === '0' ? 'text-left mt-10 bg-orange-300':'text-left mt-10'">
                                <td class="text-left mt-10">
                                    
                                    <TextInput class="text-slate-500" v-model="form.hari[index]" />

                                </td>
                                <td class="text-left mt-10" style="width:20%;">
                                    <select v-model="form.pola_kerja[index]" class="px-4 py-3 w-full rounded-full text-slate-500">
                                        <option value="Hari Kerja">Hari Kerja</option>
                                        <option value="Jadwal Libur">Jadwal Libur</option>
                                    </select>
                                </td>
                                <td class="text-left mt-10" >
                                    <TextInput v-model="form.jam_masuk[index]" :disabled="form.pola_kerja[index] === 'Jadwal Libur'" :class="form.pola_kerja[index] === 'Jadwal Libur' ? 'bg-slate-200':'bg-primary'" type="time" />
                                    <InputError class="mt-2" :message="form.errors.jam_masuk" />
                                </td>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.jam_keluar[index]"  :disabled="form.pola_kerja[index] === 'jadwal Libur'" :class="form.pola_kerja[index] === 'Jadwal Libur' ? 'bg-slate-200':'bg-primary'" type="time" />
                                </td>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.mulai_istirahat[index]"  :disabled="form.pola_kerja[index] === 'Jadwal Libur'" :class="form.pola_kerja[index] === 'Jadwal Libur' ? 'bg-slate-200':'bg-primary'" type="time" />
                                </td>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.selesai_istirahat[index]"  :disabled="form.pola_kerja[index] === 'Jadwal Libur'" :class="form.pola_kerja[index] === 'Jadwal Libur' ? 'bg-slate-200':'bg-primary'" type="time" />
                                </td>
                                <td class="text-left mt-10 ">
                                    <TextInput v-model="form.maks_istirahat[index]"  :disabled="form.pola_kerja[index] === 'Jadwal Libur'" :class="form.pola_kerja[index] === 'Jadwal Libur' ? 'bg-slate-200':'bg-primary'" type="number" />
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
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
    import { ref,inject } from 'vue'
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { storeToRefs } from 'pinia'
    const store = inject('store')
  
    const page = usePage();
    const daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
   
    const form = useForm({
        nama_polakerja: '',
        toleransi_keterlambatan: '',
        hari:[...daysOfWeek],
        pola_kerja:[],
        jam_masuk: [],
        jam_keluar: [],
        mulai_istirahat: [],
        selesai_istirahat: [],
        maks_istirahat: []
    });

 

    const submit = () => {
        form.transform(data => ({
            ...data,
            _token: page.props.auth.csrf,
        })).post(route('harian.store'), {
            onFinish: (data) => {
                store.polaHariStore.toggleSheet()
            },
        });
    };

</script>
