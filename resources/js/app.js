require('./bootstrap')
import { createApp } from 'vue'
import Buyer from './Buyer.vue'
import Seller from './Seller.vue'
import SignUp from './components/SignUp.vue'
import Login from './components/Login.vue'

const buyer = createApp(Buyer)
buyer.config.globalProperties.$env = require('./env')
buyer.mount("#buyer")

const seller = createApp(Seller)
seller.config.globalProperties.$env = require('./env')
seller.mount("#seller")

const signup = createApp(SignUp)
signup.config.globalProperties.$env = require('./env')
signup.mount("#signup")

const login = createApp(Login)
login.config.globalProperties.$env = require('./env')
login.mount("#login")



