<template>
    <!-- :active="active" -->
    <NavBuyer  @changetab="changeTab" @category="(chosenCategory) => {
        category = chosenCategory
    }"/>
    <div class="w-full flex justify-center">
        <div class="w-[1100px]">
            <Home v-if="active === 1" />
            <Watchlist v-else-if="active === 5"/>
            <Cart v-else-if="active === 6"/>
            <Payment v-else-if="active === 30" @changetab="changeTab"/>
            <Transaction v-else-if="active === 31" @changetab="changeTab"/>
            <History v-else-if="active === 4" @changetab="changeTab"/>
            <SearchResult v-else-if="active === 7"/>
            <BuyerProfile v-else-if="active === 8" @changetab="changeTab"/>
            <EditBuyerProfile v-else-if="active === 9" @changetab="changeTab"/>
            <Category v-else-if="active === 2" :category="category"/>
            <ProductDetails v-else-if="active === 12"/>
            <!-- <Sell v-else-if="active === 3"/> -->
            <!-- <Login v-else-if="active === 7"/> -->

        </div>
    </div>
    <Foot/>

</template>

<script>
    import NavBuyer from './components/NavBuyer.vue'
    import Home from './components/Home.vue'
    import Cart from './components/Cart.vue'
    import Watchlist from './components/Watchlist.vue'
    import Foot from './components/Foot.vue'
    import Payment from './components/Payment.vue'
    import Transaction from './components/Transaction.vue'
    import History from './components/History.vue'
    import Sell from './sellerComponents/Sell.vue'
    import SearchResult from './components/SearchResult.vue'
    import EditBuyerProfile from './components/EditBuyerProfile.vue'
    import BuyerProfile from './components/BuyerProfile.vue'
    import Category from './components/Category.vue'
    import ProductDetails from './components/ProductDetails.vue'


export default {
    name:'Buyer',
    data(){
        return {
            active: 1,
            category: 1,

        }
    },
    components:{
    NavBuyer,
    Home,
    Cart,
    Watchlist,
    Foot,
    SearchResult,
    Category,
    Payment,
    Transaction,
    History,
    Sell,
    BuyerProfile,
    EditBuyerProfile,
    ProductDetails
},
    methods:{
        changeTab(tabID){
            this.active = tabID
            // if (window.location.pathname === '/search')
        },
    },
    mounted() {
        const pathname = window.location.pathname
        if (pathname === '/search') this.active = 7
        else if (pathname.startsWith('/product/')) {
            const regex = /\/product\/(\d+)/
            if (regex.exec(pathname) !== null) this.active = 12
        }
    }

}
</script>