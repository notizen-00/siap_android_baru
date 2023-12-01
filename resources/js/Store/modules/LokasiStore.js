  // src/store/modules/overlay.js
  import { defineStore } from 'pinia'

  export const useLokasiStore = defineStore('lokasiStore', {
    state: () => ({
      sheet: false,
      editSheet: false,
      radius:10,
      center:{
        lat:-8.1665658046624,
        lng:113.71517142366
      },
      listDetail:[]

    }),
    actions: {
      toggleSheet() {
        this.sheet = !this.sheet
      },
      toggleEditSheet() {
        this.editSheet = !this.editSheet
      },
      
      changeRadius(value){
        this.radius = parseInt(value);
        
       
      },
      async Maps(){
        const apiKey = 'AIzaSyBeeo9yBypCnU7vRHINzcgKfFhS-huXAgo';
        const latitude = -8.1642453196032; 
        const longitude = 113.71720185588; 
        const radiusInKilometers = 5; 
        const radiusInMeters = radiusInKilometers * 1000; 
        const type = 'lodging'; 
      
        const apiUrl = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${latitude},${longitude}&radius=${radiusInMeters}&type=${type}&key=${apiKey}`;
      
        try {
          const response = await axios.get(apiUrl);
          const data = response.data;
          // Proses dan tampilkan hasilnya
          console.log(data.results); // Ini akan berisi daftar hotel terdekat dalam radius 5 kilometer
        } catch (error) {
          console.error('Terjadi kesalahan:', error);
        }

    },
async Mapss(){
        const apiKey = 'AIzaSyBeeo9yBypCnU7vRHINzcgKfFhS-huXAgo';
        const latitude = -8.1642453196032; 
        const longitude = 113.71720185588; 
        const radiusInKilometers = 5; 
        const radiusInMeters = radiusInKilometers * 1000; 
        const type = 'lodging'; 
      
        const apiUrl = `https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants+toronto+canada&key=AIzaSyBeeo9yBypCnU7vRHINzcgKfFhS-huXAgo`;
      
        try {
          const response = await axios.get(apiUrl);
          const data = response.data;
          // Proses dan tampilkan hasilnya
          console.log(data.results); // Ini akan berisi daftar hotel terdekat dalam radius 5 kilometer
        } catch (error) {
          console.error('Terjadi kesalahan:', error);
        }

    },
      changeCenter(value){
        this.center = value;

      },
      async editForm(id) {
        try {
          const response = await axios.get(`/kelola_karyawan/lokasi/${id}/edit`);
          const responseData = response.data;
          this.editSheet = !this.editSheet
          console.log(responseData.latitude);
          console.log(responseData.longitude);
          this.center.lat = parseFloat(responseData.latitude);
          this.center.lng = parseFloat(responseData.longitude);
          this.listDetail = responseData;


          // Assuming you want to update a store property with the response data
          // Replace 'yourStore' with the actual name of your store
          // yourStore.updateFormData(responseData);
        } catch (error) {
          // Handle any errors here
          console.error('Error fetching data:', error);
        }
      }


    },
    getters: {
      isSheetActive() {
        return this.sheet
      },
      getRadius(){

        return this.radius
      },
      getCenter(){
        
        return this.center;
        
      },
      isEditSheetActive(){
        return this.editSheet;
      },
      getListDetail(){
        return this.listDetail;
      }
    }
    ,
  persist: true
  })
