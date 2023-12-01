<template>
    <GoogleMap api-key="AIzaSyBeeo9yBypCnU7vRHINzcgKfFhS-huXAgo" style="width: 100%; height: 500px" :center="getCenter" :zoom="18">
        <!-- <Marker :options="{ position: center }" /> -->
        <Marker
        :options="markerOptions"
        @dragend="onMarkerDragEnd"
      />
        <Circle :options="circleOptions" :center="getCenter" :key="circleKey"/>
      </GoogleMap>
</template>
<script setup>
import { ref,inject,reactive,onMounted,watch,computed } from 'vue'
import { GoogleMap, Marker,Circle } from "vue3-google-map";
import {storeToRefs} from 'pinia'

const store = inject('store')
const { getRadius,getCenter } = storeToRefs(store.lokasiStore)

const circleKey = ref(0);
// const center = ref({ lat: -8.1642878, lng: 113.7168183 });

const circleOptions = computed(() => ({
  center: getCenter.value,
  radius: getRadius.value,
  fillColor: '#00FF00',
  fillOpacity: 0.35,
  strokeWeight: 2,
  strokeColor: '#0000FF',
}));


const markerOptions = ref({
  position: getCenter.value, 
  draggable: true, // Buat marker dapat digeser
});

const onMarkerDragEnd = (event) => {
  const newPosition = {
    lat: event.latLng.lat(),
    lng: event.latLng.lng(),
  };
//   center.value = newPosition;
  // Update properti markerOptions dengan koordinat baru
//   markerOptions.value.position = newPosition;
  store.lokasiStore.changeCenter(newPosition);
  circleKey.value += 1;
  
//   console.log(center.value)

};


</script>