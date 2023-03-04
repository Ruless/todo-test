import './bootstrap';
import { createApp } from 'vue';

import PrimeVue from 'primevue/config';

const app = createApp({});
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import eventBus from 'vue3-eventbus'

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);
app.use(ElementPlus)

app.use(eventBus)
app.mount('#app');

