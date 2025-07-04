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

// Import AOS library untuk animasi scroll
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inisialisasi AOS
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false,
    });
});

// Tambahkan smooth scrolling untuk navigasi
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');
        if (targetId === '#') return;

        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 100,
                behavior: 'smooth',
            });
        }
    });
});

// Toggle mobile menu
const mobileMenuButton = document.querySelector('.mobile-menu-button');
const mobileMenu = document.querySelector('.mobile-menu');

if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}

window.toggleLike = function(productId) {
    const btn = document.querySelector(`button[onclick*='toggleLike(${productId})']`);
    const icon = document.getElementById(`heart-${productId}`);
    // Update semua icon dan count yang punya id sama (card & detail)
    const allIcons = document.querySelectorAll(`#heart-${productId}`);
    const allCounts = document.querySelectorAll(`#like-count-${productId}`);
    fetch(`/product/${productId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || window.Laravel?.csrfToken,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            allIcons.forEach(ic => {
                if(data.isLiked) {
                    ic.classList.add('text-red-500');
                    ic.classList.remove('text-gray-600');
                    ic.setAttribute('fill', 'currentColor');
                } else {
                    ic.classList.remove('text-red-500');
                    ic.classList.add('text-gray-600');
                    ic.setAttribute('fill', 'none');
                }
            });
            allCounts.forEach(cnt => {
                // Jika ada span.like-count-number di dalamnya, update itu saja
                const numberSpan = cnt.querySelector('.like-count-number');
                if(numberSpan) {
                    numberSpan.textContent = data.suka;
                } else {
                    cnt.textContent = data.suka;
                }
            });
        }
    });
}
