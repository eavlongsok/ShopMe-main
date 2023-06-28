require('./bootstrap')
import { createApp } from 'vue'
import Seller from './Seller.vue'

const seller = createApp(Seller)
seller.mount("#seller")
