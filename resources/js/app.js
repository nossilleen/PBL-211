/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
// import { createApp } from 'vue';

/**
 * Jika tidak butuh Vue di halaman home, cukup comment semua kode Vue agar tidak error.
 * Jika butuh, pastikan alias sudah benar di vite.config.js
 */

// const app = createApp({});
// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);
// app.mount('#app');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
