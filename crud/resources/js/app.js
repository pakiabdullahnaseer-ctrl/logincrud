import './bootstrap';

import { createApp } from 'vue';

import Login from './components/login.vue';
import Register from './components/register.vue';

if (document.getElementById('login')) {
    createApp(Login).mount('#login');
}

if (document.getElementById('register')) {
    createApp(Register).mount('#register');
}