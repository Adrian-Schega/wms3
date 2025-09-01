import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import Welcome from './components/Welcome.vue';

// Create Vue app with the Welcome component as the root
const app = createApp(Welcome);

// Setup Pinia for state management
const pinia = createPinia();
app.use(pinia);

// Mount Vue app
app.mount('#app');
