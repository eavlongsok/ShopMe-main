<template>
    <!-- :active="active" -->
    <NavSeller  @changetab="changeTab"/>
    <div class="w-full flex justify-center min-h-[600px]">
        <div class="w-[1200px]">
            <SellerHome v-if="active === 1" @onsale="(product) => {
                active = 11
                onSaleProduct = product
            }"/>
            <Sell v-else-if="active === 2"/>
            <Sales v-else-if="active === 3"/>
            <Verify v-else-if="active === 4"/>
            <OnSale v-else-if="active === 11" :product="onSaleProduct" @changetab="changeTab"/>
            <EditProduct v-else-if="active === 12" :product="onSaleProduct" @changetab="changeTab"/>

            <SellerProfile v-else-if="active === 0" @changetab="changeTab"/>
            <EditSellerProfile v-else-if="active === -1" @changetab="changeTab"/>
            <!-- <Login v-else-if="active === 7"/> -->

        </div>
    </div>
    <Foot/>

</template>

<script>
    import NavSeller from './sellerComponents/NavSeller.vue'
    import Foot from './components/Foot.vue'
    import Sell from './sellerComponents/Sell.vue'
    import Verify from './sellerComponents/Verify.vue'
    import SellerProfile from './sellerComponents/SellerProfile.vue'
    import EditSellerProfile from './sellerComponents/EditSellerProfile.vue'
    import Sales from './sellerComponents/Sales.vue'
    import SellerHome from './sellerComponents/SellerHome.vue'
    import OnSale from './sellerComponents/OnSale.vue'
    import EditProduct from './sellerComponents/EditProduct.vue'


    export default {
        name:'Seller',
        data(){
            return {
                active: 1,
                onSaleProduct: {}
            }
        },
        components:{
        NavSeller,
        Foot,
        Verify,
        Sell,
        SellerHome,
        SellerProfile,
        EditSellerProfile,
        Sales,
        OnSale,
        EditProduct
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