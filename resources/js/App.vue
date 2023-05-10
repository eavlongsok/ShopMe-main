<template>
    
    <Navbar :active="active" @changetab="changeTab"/>
    <div class="w-full flex justify-center">
        <div class="w-[1100px]">
            <Home v-if="active === 1" />
            <Cart v-else-if="active === 5"/>
        </div>
    </div>
    
</template>

<script>
import Navbar from './components/Navbar.vue'
import Home from './components/Home.vue'
import Cart from './components/Cart.vue'

export default {
    data(){
        return {
            active: 1,
        }
    },
    components:{
        Navbar,Home,Cart
    },
    methods:{
        changeTab(tabID){
            this.active = tabID
        }
    }
    
}
</script>