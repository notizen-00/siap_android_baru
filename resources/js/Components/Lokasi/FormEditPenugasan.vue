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

                    <v-row>
                        <v-col cols="3">
                            <InputLabel for="radius_lokasi" class="mt-5 text-start">
                                Pilih Karyawan <span class="text-red">*</span>
                            </InputLabel>
                        </v-col>
                        <v-col cols="9">
                            <v-select
                            clearable
                            chips
                            label="Pilih Karyawan"
                            density="compact"
                            variant="underlined"
                            :items="listKaryawanPenugasan"
                            multiple
                          ></v-select>
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
    const { getRadius,getCenter,getListDetail } = storeToRefs(store.lokasiStore)
    const page = usePage();
    const form = useForm({
        nama_lokasi:getListDetail.value.nama_lokasi,
        radius_lokasi:getListDetail.value.radius_lokasi,
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

        form.transform(data => ({
            ...data,
            latitude:getCenter.value.lat,
            longitude:getCenter.value.lng,
            _token: page.props.auth.csrf,
        })).post(route('lokasi.store'), {
            onFinish: (data) => {
                store.lokasiStore.togglePenugasanSheet()
                // console.log(data)
            },
        });
    };

    onMounted(()=>{
        store.lokasiStore.fetchPenugasanKaryawan()
        console.log(props.listKaryawanPenugasan)
    })
</script>
