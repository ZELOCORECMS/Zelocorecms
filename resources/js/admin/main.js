import { createApp } from 'vue';
import { createPinia } from 'pinia';
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import App from './App.vue';
import router from './router';
import 'primeicons/primeicons.css';

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            prefix: 'p',
            darkModeSelector: '.p-dark',
            cssLayer: false
        }
    }
});

app.mount('#admin-app');

// Remove PrimeVue license banner as soon as it appears in the DOM
const removeLicenseBanner = () => {
    const el = document.getElementById('p-license-host');
    if (el) { el.remove(); return; }
    const observer = new MutationObserver(() => {
        const banner = document.getElementById('p-license-host');
        if (banner) { banner.remove(); observer.disconnect(); }
    });
    observer.observe(document.body, { childList: true });
};
removeLicenseBanner();
