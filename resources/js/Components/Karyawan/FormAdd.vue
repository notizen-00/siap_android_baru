<template>
    <v-container fluid>
        <form @submit.prevent="submit">
            <v-row>
                <v-col cols="3">
                    <InputLabel for="nama_divisi" class="mt-5 text-start">
                         Divisi <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <select v-model="form.divisi_id" class="d-flex justify-start px-4 py-3 w-1/5 bg-slate-900 text-white rounded-lg  ring-1 ring-blue-400" >
                        <option value="">-- Pilih Divisi --</option>
                        <option v-for="item in listDivisi" :value="item.id" :key="item.id">
                            {{ item.nama_divisi }}
                        </option>
                    </select>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Jabatan
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput class="mr-1 w-full" v-model="form.jabatan"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.jabatan" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Nama  <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput class="mr-1 w-full" v-model="form.nama_karyawan"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.nama_karyawan" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="nama_divisi" class="mt-5 text-start">
                         Jenis Kelamin <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <select v-model="form.jenis_kelamin" class="d-flex justify-start px-4 py-3 bg-slate-900 text-white w-1/5 rounded-lg  ring-1 ring-blue-400">
                        <option value="">-- jenis kelamin --</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>   
                     </select>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Nomor Telepon <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput class="mr-1 w-1/5" v-model="form.no_hp"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.no_hp" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="zona_waktu" class="mt-5 text-start">
                         Zona Waktu  <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <select v-model="form.zona_waktu" class="d-flex justify-start px-4 py-3 w-1/5 bg-slate-900 text-white rounded-lg ring-1 ring-blue-400">
                        <option value="">-- Zona Waktu --</option>
                        <option value="WIB">WIB</option>
                        <option value="WITA">WITA</option>
                        <option value="WIT">WIT</option>   
                     </select>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="jenis_identitas" class="mt-5 text-start">
                         Jenis Identitas karyawan
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <select v-model="form.jenis_identitas" class="d-flex justify-start px-4 py-3 w-1/5 rounded-lg ring-1 bg-slate-900 text-white ring-blue-400">
                        <option value="">-- Jenis Identitas --</option>
                        <option value="KTP">KTP</option>
                        <option value="NIP">NIP</option>
                        <option value="NRP">NRP</option>   
                     </select>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="nomor_identitas" class="mt-5 text-start">
                        Nomor Identitas Karyawan 
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput class="mr-1 w-1/3" v-model="form.no_identitas"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.no_identitas" />
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="3">
                    <InputLabel for="file_identitas" class="mt-5 text-start">
                        File Identitas
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <label class="block">
                        <span class="sr-only">Pilih File Identitas</span>
                        <input type="file"  @input="form.file_identitas = $event.target.files[0]"  class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-violet-50 file:text-violet-700
                          hover:file:bg-violet-100
                        "/>
                      </label>
                    <InputError class="mt-2" :message="form.errors.file_identitas" />
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="3">
                    <InputLabel for="foto_profil" class="mt-5 text-start">
                        Foto Profil
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <label class="block">
                        <span class="sr-only">Pilih Foto Profil</span>
                        <input type="file" @input="form.foto_profil = $event.target.files[0]"  class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-violet-50 file:text-violet-700
                          hover:file:bg-violet-100
                        "/>
                      </label>
                    <InputError class="mt-2" :message="form.errors.foto_profil" />
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="3">
                    <InputLabel for="nomor_identitas" class="mt-5 text-start">
                        Tanggal Lahir
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput type="date" class="mr-1 w-1/3 bg-slate-900 text-white" v-model="form.tgl_lahir"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.tgl_lahir" />
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="3">
                    <InputLabel for="nomor_identitas" class="mt-5 text-start">
                        Tanggal Mulai Bekerja
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput type="date" class="mr-1 w-1/3 bg-slate-900 text-white" v-model="form.tgl_mulai_bekerja"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.tgl_mulai_bekerja" />
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="3">
                    <InputLabel for="sisa_cuti" class="mt-5 text-start">
                       Sisa Cuti
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput type="number" class="mr-1 w-1/3 bg-slate-900 text-white" v-model="form.sisa_cuti"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.sisa_cuti" />
                </v-col>
            </v-row>
            <v-row class="mt-10">
                <div class="flex items-center font-extrabold text-primary text-h5 mb-2 justify-start mt-7 w-full">
                    Akun Masuk Aplikasi Mobile
                </div>

            </v-row>
            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Email  <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput type="email" class="mr-1 w-full bg-slate-900 text-white" v-model="form.email"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.email" />
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="3">
                    <InputLabel for="sistem_kerja" class="mt-5 text-start">
                        Kata Sandi  <span class="text-red">*</span>
                    </InputLabel>
                </v-col>
                <v-col cols="9">
                    <div class="d-flex justify-start">
                        <TextInput type="password" autocomplete class="mr-1 w-full bg-slate-900 text-white" v-model="form.password"></TextInput>
                    </div>
                    <InputError class="mt-2" :message="form.errors.password" />
                </v-col>
            </v-row>
           
            <v-row>
                <div class="flex items-center justify-center mt-4 w-full">
                    <PrimaryButton type="submit" @click="color = '#ff00ff'" class="ml-4 bg-primary w-2/3 d-flex justify-center"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        <i class="fas fa-save mr-2 text-center"></i> Simpan Data
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
   const props =  defineProps({
        listItem:Object,
        listDivisi:Object
    })


    const page = usePage();

    const form = useForm({
        divisi_id:"",
        nama_karyawan:"",
        name:"",
        jabatan:"",
        jenis_kelamin:"",
        no_hp:"",
        zona_waktu:"",
        no_identitas:"",
        jenis_identitas:"",
        file_identitas:"",
        foto_profil:"",
        tgl_lahir:"",
        tgl_mulai_bekerja:"",
        sisa_cuti:"",
        email:"",
        password:"",
        
    });

   

    onMounted(()=>{
        console.log(props.listDivisi)
    })
  

    const submit = () => {
        form.name = form.nama_karyawan;
        form.transform(data => ({
            ...data,
            
            forceFormData: true,
            _token: page.props.auth.csrf,
        })).post(route('karyawan.store'), {
            onFinish: (data) => {
                store.karyawanStore.toggleSheet()
            },
        });
    };

</script>
