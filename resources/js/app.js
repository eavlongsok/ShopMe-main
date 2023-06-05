require('./bootstrap')
import { createApp } from 'vue'
import App from './App.vue'
import SignUp from './components/SignUp.vue'
import Login from './components/Login.vue'


const app = createApp(App)
app.mount("#app")

const signup = createApp(SignUp)
signup.mount("#signup")

const login = createApp(Login)
login.mount("#login")



