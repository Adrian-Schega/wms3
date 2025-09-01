import './bootstrap';
import { createApp } from 'vue';
import Welcome from './components/Welcome.vue';

// Create Vue app
const app = createApp({});

// Register components
app.component('Welcome', Welcome);

// Mount Vue app
app.mount('#app');
