<template>
    <v-container fluid>
        <div class="text-h5 text-left mb-5"># Karyawan di tugaskan</div>
        <form @submit.prevent="submit">
                    <v-row>
                        <v-col cols="3">
                            <InputLabel for="nama_lokasi" class="mt-5 text-start">
                                Nama Lokasi <span class="text-red">*</span>
                            </InputLabel>
                        </v-col>
                        <v-col cols="9">
                            <TextInput id="nama_lokasi" v-model="form.nama_lokasi"  class="mt-1 block w-full"
                                autofocus autocomplete="nama_lokasi" />
                            <InputError class="mt-2" :message="form.errors.nama_lokasi" />

                        </v-col>
                    </v-row>
                    <div class="h-100 overflow-auto mt-10">
                        <span class="text-red-400 mt-10">Karyawan Di tugaskan</span>
                        <v-list lines="two" max-height="200" max-width="500" class="mx-auto mt-5 mb-5">
                            <v-list-item
                                class="bg-red-400"
                                v-for="n in values"
                                :key="n"
                                :title="n.item"
                                :subtitle="'Jabatan '+ n.jabatan"
                                prepend-avatar="https://randomuser.me/api/portraits/women/8.jpg"
                            ></v-list-item>
                            
                            </v-list>
                    </div>
                    <v-row>
                        <v-col cols="3">
                            <InputLabel for="radius_lokasi" class="mt-5 text-start">
                                Pilih Karyawan <span class="text-red">*</span>
                            </InputLabel>
                        </v-col>
                        <v-col cols="9">
                            <v-select
                            clearable
                            v-model="form.karyawan_id"
                            chips
                            label="Pilih Karyawan"
                            density="compact"
                            variant="outlined"
                            :items="listKaryawan"
                            item-title="item"
                            item-value="value"
                            multiple
                            >
                            </v-select>
                        </v-col>
                    </v-row>
                    <PrimaryButton type="submit" @click="color = '#ff00ff'" class="ml-4 bg-primary mt-10"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        <i class="fas fa-save mr-2"></i> Update Data
                    </PrimaryButton>
                

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
    import { ref,inject,computed,onMounted } from 'vue'
    import Maps from '@/Components/Lokasi/mapLokasi.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { storeToRefs } from 'pinia'
    const store = inject('store')
    const { getRadius,getCenter,getListDetail,getDetailPenugasan,getKaryawanPenugasan } = storeToRefs(store.lokasiStore)
    const {getKaryawan} = storeToRefs(store.karyawanStore)
    const page = usePage();
    const values = ref([])
    const listKaryawan = ref([]);

    const form = useForm({
        nama_lokasi:getDetailPenugasan.value[0].lokasi.nama_lokasi,
        karyawan_id:values.value,
        lokasi_id:getDetailPenugasan.value[0].lokasi.id
    })
    const props = defineProps({
        listKaryawanPenugasan:Object
    })
    const radius = computed(() => {
        return parseInt(form.radius_lokasi);
    });


    const changeRadius = () =>{
        store.lokasiStore.changeRadius(form.radius_lokasi);
    }

    const submit = () => {
        // console.log(form.latitude)
        // console.log(form.karyawan_id);
        form.transform(data => ({
            ...data,
            _token: page.props.auth.csrf,
            _method: "put",
        })).post(route('lokasi_penugasan.update',getDetailPenugasan.value[0].lokasi.id), {
            onFinish: (data) => {
                if(data == 2){
                    alert('test')
                }
                store.lokasiStore.togglePenugasanSheet()
                // console.log(data)
            },
        });
    };

    onMounted(()=>{
        getDetailPenugasan.value.forEach((user) => {
        form.karyawan_id.push({
            item:user.karyawan.nama_karyawan,
            value:user.karyawan.id
        })
        values.value.push({
            item:user.karyawan.nama_karyawan,
            value:user.karyawan.id,
            jabatan:user.karyawan.jabatan
        })
    });
        console.log(getKaryawan.value)
        getKaryawan.value.forEach((user) => {
                listKaryawan.value.push({
                item: user.nama_karyawan,
                value: user.id,
        });
        });

    })
</script>
