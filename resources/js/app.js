require('./bootstrap')
import { createApp } from 'vue'
import Buyer from './Buyer.vue'
import Seller from './Seller.vue'
import SignUp from './components/SignUp.vue'
import Login from './components/Login.vue'


const buyer = createApp(Buyer)
buyer.mount("#buyer")

const seller = createApp(Seller)
seller.mount("#seller")

const signup = createApp(SignUp)
signup.mount("#signup")

const login = createApp(Login)
login.mount("#login")



