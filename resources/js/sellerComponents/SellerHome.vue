<template>
    <div class="w-full mx-2 mt-5 mb-2">
        <h1 class="text-2xl">Currently On Sales</h1>
    </div>

    <div v-if="!loadedProducts" class="flex justify-center items-center h-[40vh]">
            <Loader :size="4" :thickness="0.4"/>
    </div>

    <div v-for="product in products" class="border-2 hover:border-4 my-5 rounded-lg h-[200px] flex flex-row justify-around items-center cursor-pointer hover:bg-gradient-to-r from-white to-blue-100" @click="$emit('onsale', product)">
        <div class="w-[200px] h-[200px] border-r-2">
            <img :src="product.img_url" class="w-[190px] h-[200px] cursor-pointer object-fill"/>
        </div>
        <div class="w-4/5 pl-7">
            <p class="text-2xl font-bold">{{ product.product_name }}</p>
            <p class="mb-1">Category:<span class="cursor-pointer ml-2">{{product.category_name}}</span></p>
            <p class="text-2xl cursor-pointer mb-5 inline-block">{{ product.name }}</p><br/>
            <span class="cursor-text">Price: ${{ toUSCurrency(product.price) }}</span><br/>
            <span class="cursor-text">Sold: {{product.product_sold}}, In Stock: {{product.quantity}}</span><br/>
            <span class="cursor-text">Total Revenue: {{ toUSCurrency(product.quantity * product.product_sold ) }}</span>
        </div>
        <div class="w-1/12 h-full flex items-center justify-center">
            <img src="next-arrow.png" class="block scale-50"/>
        </div>
    </div>

    <div class="w-full mx-2 mt-5 mb-2">
        <h1 class="text-2xl">Pending Approval</h1>
    </div>

    <div v-if="!loadedPAProducts" class="flex justify-center items-center h-[400px]">
        <Loader :size="4" :thickness="0.4"/>
    </div>

    <div v-if="loadedPAProducts && pendingApprovalProducts.length == 0" class="flex justify-center items-center h-[300px]">
        <p class="text-2xl">No Pending Approval Products</p>
    </div>

    <div v-else="pendingApprovalProducts.length != 0" v-for="product in pendingApprovalProducts" class="border-2 hover:border-4 my-5 rounded-lg h-[200px] flex flex-row justify-around items-center cursor-pointer hover:bg-gradient-to-r from-white to-blue-100" @click="$emit('onsale', product)">
        <div class="w-[200px] border-r-2">
            <img :src="product.img_url" class="w-[190px] cursor-pointer"/>
        </div>
        <div class="w-4/5 pl-7">
            <p class="text-2xl font-bold">{{ product.product_name }}</p>
            <p class="mb-1">Category:<span class="cursor-pointer ml-2">{{product.category_name}}</span></p>
            <p class="text-2xl cursor-pointer mb-5 inline-block">{{ product.name }}</p><br/>
            <span class="cursor-text">Price: ${{ toUSCurrency(product.price) }}</span><br/>
            <span class="cursor-text">Sold: {{product.product_sold}}, In Stock: {{product.quantity}}</span><br/>
            <span class="cursor-text">Total Revenue: {{ toUSCurrency(product.quantity * product.product_sold ) }}</span>
        </div>
        <div class="w-1/12 h-full flex items-center justify-center">
            <img src="next-arrow.png" class="block scale-50"/>
        </div>
    </div>

</template>

<script>
    import Loader from '../components/Loader.vue'
    export default{
        name: 'SellerHome',
        data(){
            return {
                loadedProducts: false,
                products: [],
                pendingApprovalProducts: [],
                loadedPAProducts: false,
            }
        },
        components: {Loader},
        emits: ['onsale'],
        methods: {
            toUSCurrency(num) {
                return num.toLocaleString('en-US', { style: 'currency', currency: 'USD' })
            },
            async getProducts() {
                this.loadedProducts = false
                try {
                    const response = await axios.get('/api/seller/products', {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('seller_token')}`
                        }})
                        console.log(response.data)
                    this.products = response.data.products
                }
                catch(err) {
                    console.log(err.response.data)
                }
                this.loadedProducts = true
            },
            async getPendingApprovalProducts() {
                this.loadedPAProducts = false
                try {
                    const response = await axios.get('/api/seller/products/pendingApproval', {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('seller_token')}`
                        }})
                    console.log(response.data)
                    this.pendingApprovalProducts = response.data.products
                }
                catch(err) {
                    console.log(err.response.data)
                }
                this.loadedPAProducts = true
            }
        },
        async mounted() {
            await this.getProducts()
            await this.getPendingApprovalProducts()
        }
    }
</script>