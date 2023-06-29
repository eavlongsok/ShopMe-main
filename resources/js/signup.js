require('./bootstrap')
import { createApp } from 'vue'
import SignUp from './components/SignUp.vue'

const signup = createApp(SignUp)
signup.mount("#signup")