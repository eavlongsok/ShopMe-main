<template>
    
    <Navbar :active="active" @changetab="changeTab"/>
    <div class="w-full flex justify-center">
        <div class="w-[1100px]">
            <Home v-if="active === 1" />
            <Watchlist v-else-if="active === 5"/>
            <Cart v-else-if="active === 6"/>

            <Shirt v-else-if="active === 10"/>
            <Pant v-else-if="active === 11"/>
            <Shoes v-else-if="active === 12"/>
            <PC v-else-if="active === 13"/>
            <Camera v-else-if="active === 14"/>
            <Device v-else-if="active === 15"/>
            <Tables v-else-if="active === 16"/>
            <Chair v-else-if="active === 17"/>
            <Bed v-else-if="active === 18"/>
            <Promotions v-else-if="active === 19"/>
            <Toy v-else-if="active === 20"/>
            <Beauty v-else-if="active === 21"/>
        </div>
    </div>
    <Foot/>
    
</template>

<script>
import Navbar from './components/Navbar.vue'
import Home from './components/Home.vue'
import Cart from './components/Cart.vue'
import Watchlist from './components/Watchlist.vue'
import Foot from './components/Foot.vue'

import Shirt from './Items/Shirt.vue'
import Pant from './Items/Pant.vue'
import Shoes from './Items/Shoes.vue'
import PC from './Items/PC.vue'
import Camera from './Items/Camera.vue'
import Device from './Items/Device.vue'
import Tables from './Items/Tables.vue'
import Chair from './Items/Chair.vue'
import Bed from './Items/Bed.vue'
import Promotions from './Items/Promotions.vue'
import Toy from './Items/Toy.vue'
import Beauty from './Items/Beauty.vue'


export default {
    data(){
        return {
            active: 1,
        }
    },
    components:{
        Navbar,Home,Cart,Watchlist,Foot,Shirt,Pant,Shoes,
        PC,Camera,Device,Tables,Chair,Bed,Promotions,Toy,
        Beauty
    },
    methods:{
        changeTab(tabID){
            this.active = tabID
        }
    }
    
}
</script>