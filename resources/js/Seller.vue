<template>
    <!-- :active="active" -->
    <NavSeller  @changetab="changeTab"/>
    <div class="w-full flex justify-center">
        <div class="w-[1100px]">
            <SellerHome v-if="active === 1" />
            <!-- <Watchlist v-else-if="active === 5"/>
            <Cart v-else-if="active === 6" @changetab="changeTab"/> -->
            <Payment v-else-if="active === 30" @changetab="changeTab"/>
            <Transaction v-else-if="active === 31" @changetab="changeTab"/>
            <Sales v-else-if="active === 4" @changetab="changeTab"/>
            <Sell v-else-if="active === 3"/>
            <Verify v-else-if="active === 5"/>
            <Profile v-else-if="active === 8" @changetab="changeTab"/>
            <EditProfile v-else-if="active === 9" @changetab="changeTab"/>
            <!-- <Login v-else-if="active === 7"/> -->

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
import NavSeller from './components/NavSeller.vue'
import Home from './components/Home.vue'
import Cart from './components/Cart.vue'
import Watchlist from './components/Watchlist.vue'
import Foot from './components/Foot.vue'
import Payment from './components/Payment.vue'
import Transaction from './components/Transaction.vue'
import History from './components/History.vue'
import Sell from './components/Sell.vue'
import Verify from './components/Verify.vue'
import Profile from './components/Profile.vue'
import EditProfile from './components/EditProfile.vue'
import Sales from './components/Sales.vue'

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
import SellerHome from './sellerComponents/SellerHome.vue'


export default {
    name:'Seller',
    data(){
        return {
            active: 1,
        }
    },
    components:{
        NavSeller,
        Cart,
        Watchlist,
        Foot,
        Verify,
        Shirt,
        Pant,
        Shoes,
        PC,
        Camera,
        Device,
        Tables,
        Chair,
        Bed,
        Promotions,
        Toy,
        Beauty,
        Payment,
        Transaction,
        History,
        Sell,
        SellerHome,
        Profile,
        EditProfile,
        Sales,
    },
    methods:{
        changeTab(tabID){
            this.active = tabID
            window.scrollTo(0,0);
        },
    },
    mounted() {

    }

}
</script>