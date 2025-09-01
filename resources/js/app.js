import './bootstrap';
import { createApp } from 'vue';
import Welcome from './components/Welcome.vue';

// Create Vue app with the Welcome component as the root
const app = createApp(Welcome);

// Mount Vue app
app.mount('#app');
