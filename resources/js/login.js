require('./bootstrap')
import { createApp } from 'vue'
import Login from './components/Login.vue'

const login = createApp(Login)
login.mount("#login")