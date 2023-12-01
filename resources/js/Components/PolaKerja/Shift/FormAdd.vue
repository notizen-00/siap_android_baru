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
                    <InputLabel for="catatan" class="mt-5 text-start">
                        Catatan
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <TextInput id="catatan" v-model="form.catatan" type="text" class="mt-1 block w-full" autofocus
                        autocomplete="catatan" />
                    <InputError class="mt-2" :message="form.errors.catatan" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="warna" class="mt-5 text-start">
                        Warna
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <v-btn :color="form.warna" class=" border-8 border-separate d-flex justify-start">

                        <v-overlay activator="parent" location-strategy="connected" scroll-strategy="block">
                            <v-color-picker v-model="form.warna" hide-inputs></v-color-picker>
                        </v-overlay>
                    </v-btn>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="warna" class="mt-5 text-start">
                        Jadwal Shift <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <v-table height="150px">
                        <thead>
                            <tr>
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
                            <tr>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.jam_masuk" class="bg-primary" type="time" />
                                    <InputError class="mt-2" :message="form.errors.jam_masuk" />
                                </td>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.jam_keluar" class="bg-primary" type="time" />
                                </td>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.mulai_istirahat" class="bg-primary" type="time" />
                                </td>
                                <td class="text-left mt-10">
                                    <TextInput v-model="form.selesai_istirahat" class="bg-primary" type="time" />
                                </td>
                                <td class="text-left mt-10 ">
                                    <TextInput v-model="form.maks_istirahat" type="number" />
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
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';

    const page = usePage();

    const form = useForm({
        nama_polakerja: '',
        toleransi_keterlambatan: '',
        catatan: '',
        warna: '#4287f5',
        jam_masuk: '',
        jam_keluar: '',
        mulai_istirahat: '',
        selesai_istirahat: '',
        maks_istirahat: ''
    });

    const submit = () => {
        form.transform(data => ({
            ...data,
            _token: page.props.auth.csrf,
        })).post(route('shift.store'), {
            onFinish: (data) => {

            },
        });
    };

</script>
