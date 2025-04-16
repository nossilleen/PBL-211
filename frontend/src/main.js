import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import './assets/css/main.css'

// Konfigurasi axios
axios.defaults.baseURL = 'http://localhost:8000/api'
axios.defaults.withCredentials = true

const app = createApp(App)
app.use(router)
app.config.globalProperties.$axios = axios
app.mount('#app') 