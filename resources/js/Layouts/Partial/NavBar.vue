<template>
    <v-app-bar
    height="80"
    prominent
  >
    

    <v-spacer></v-spacer>

    <v-btn
      append-icon="fas fa-angle-down"
      size="small"
    >
      <span class="font-bold">Halo</span>,<span class="text-xs">{{ $page.props.auth.user.name }}</span>
      
      <v-menu activator="parent">
        <v-list>
          <v-list-item
          >
            <v-list-item-title>Test</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-btn>

    <v-tooltip text="Zona Waktu Anda" location="bottom">
        <template v-slot:activator="{ props }">
          <v-btn prepend-icon="fas fa-globe" v-bind="props">WIB</v-btn>
        </template>
      </v-tooltip>

    <v-btn @click="toggleTheme" :icon="theme.global.current.value.dark ? 'far fa-lightbulb' : 'far fa-moon' "></v-btn>
   

    
  </v-app-bar>
</template>
<script setup>
    import { ref,watch } from 'vue'
    import { useTheme } from 'vuetify'

const theme = useTheme()

function toggleTheme () {
  theme.global.name.value = theme.global.current.value.dark ? 'myLight' : 'dark'
}

</script>