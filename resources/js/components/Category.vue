<template>
    <div class="w-full mx-2 my-3">
        <h1 class="text-2xl">{{category_name}}</h1>
    </div>
    <div v-if="!loaded" class="flex justify-center items-center h-[600px]">
        <Loader :size="4" :thickness="0.4"/>
    </div>
    <div class="w-full grid grid-cols-3 my-3 min-h-[900px]" v-else>
        <div v-for="product in products" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
            <div class="flex justify-center my-2">
                <img :src="product.img_url" class="object-cover w-[300px] h-[290px]" />
            </div>

            <div class="mx-4 my-3 py-2">
                <h2 class="font-bold my-2">{{ product.product_name }}</h2>
                <p class="my-1">${{ toUSCurrency(product.price) }}</p>
            </div>

            <div class="mx-3 my-2 flex justify-between">
                <div>
                    <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white" @click="addToWatchlist(product.product_id)">Watchlist</button>
                </div>
                <div>
                    <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white active:opacity-0" @click="addToCart(product.product_id)">Cart</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import {watch} from 'vue';
    import Loader from '../components/Loader.vue'
    export default {
        name: 'Category',
        props: ['category'],
        components: {Loader},
        data(){
            return {
                category_name: '',
                products:[],
                productID: [],
                cart: [],
                loaded: false,
            }
        },
        methods: {
            toUSCurrency(num) {
                return num.toLocaleString('en-US', { style: 'currency', currency: 'USD' })
            },
            async getProducts() {
                this.loaded = false
                this.products = []
                this.category_name = ''

                let params = new URLSearchParams()
                params.append('category', this.category)
                try{
                    const response = await axios.get('/api/buyer/products/', {
                            params,
                            headers: {
                                "Authorization": "Bearer " + localStorage.getItem("buyer_token")
                            }
                        })
                    this.products = response.data.products
                    this.category_name = response.data.category_name
                    this.loaded = true
                }
                catch(err){
                    console.log(err.response.data)
                }
            },
            addToCart(id){
                let cart = localStorage.getItem('cart')
                if(cart === null || cart == undefined){
                    localStorage.setItem('cart',JSON.stringify([{
                        id: id,
                        qty: 1
                    }]))
                }
                else{
                    cart = JSON.parse(cart)
                    let duplicate = false
                    cart.forEach(item => {
                    if (item.id == id)
                        duplicate = true
                        return
                    })

                    if (duplicate) {
                        alert('Item already in cart')
                        return;
                    }

                    cart.push({
                        id: id,
                        qty: 1
                    })
                    localStorage.setItem('cart',JSON.stringify(cart))
                }


            },
            addToWatchlist(id){
                let watchlist = localStorage.getItem('watchlist')
                if(watchlist === null || watchlist == undefined){
                    localStorage.setItem('watchlist',JSON.stringify([{
                        id: id,
                        qty: 1
                    }]))
                }
                else{
                    watchlist = JSON.parse(watchlist)
                    let duplicate = false
                    watchlist.forEach(item => {
                    if (item.id == id)
                        duplicate = true
                        return
                    })

                    if (duplicate) {
                        alert('Item already in Watchlist')
                        return;
                    }

                    watchlist.push({
                        id: id,
                        qty: 1
                    })
                    localStorage.setItem('watchlist',JSON.stringify(watchlist))
                }
            }
        },
        watch: {
            category: async function(newVal, oldVal) {
                this.getProducts();
            }
        },
       async mounted(){
            this.getProducts()
       },

    }
</script>