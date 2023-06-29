require('./bootstrap')

import { createApp } from 'vue'
import Buyer from './Buyer.vue'

const buyer = createApp(Buyer)
buyer.mount("#buyer")