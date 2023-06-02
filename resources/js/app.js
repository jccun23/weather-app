import './bootstrap';
import { createApp } from 'vue';

import MainApp from './components/MainApp.vue';

const app = createApp(MainApp);
app.mount('#app');
