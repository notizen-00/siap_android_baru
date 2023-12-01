import './bootstrap';
import '../css/app.css';
import '../css/main.scss';


import { createApp, h } from 'vue';
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { pinia } from './Store/pinia'
import { useStore } from '@/Store/modules'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

import {
  VDataTable,
  VDataTableServer,
  VDataTableVirtual,
} from "vuetify/labs/VDataTable";
import { VBottomSheet } from 'vuetify/labs/VBottomSheet'

const myLight = {
  dark: false,
  colors: {
    background: '#a6958f',
    surface: '#FFFFFF',
    primary: '#6200EE',
    'primary-darken-1': '#3700B3',
    secondary: '#03DAC6',
    'secondary-darken-1': '#018786',
    error: '#B00020',
    info: '#2196F3',
    success: '#4CAF50',
    warning: '#FB8C00',
    something:'#eb6434'
  },
}

const myDark = {
  dark: true,
  colors: {
    something: '#eb6434', 
    
  },
}


const vuetify = createVuetify({
  components:{
    ...components,
    ...directives,
    VDataTable,
    VDataTableServer,
    VBottomSheet
  },
  icons: {
    defaultSet: 'mdi',
    aliases,
    sets: {
      mdi,
    },
  },
  theme: {
    defaultTheme: 'dark',
    themes: {
      myLight,
      dark: {
        ...myDark.colors, 
      },
        
    },
  },
})

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .use(pinia)
            .provide('store', useStore())
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
