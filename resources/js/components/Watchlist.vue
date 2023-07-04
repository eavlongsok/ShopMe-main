<template>
<div class="min-h-[900px]">
     <div v-if="!loaded" class="flex justify-center items-center h-[700px]">
        <Loader :size="4" :thickness="0.4"/>
    </div>
    <div v-for="product in products" :key="product.product_id" v-else-if="loaded && products.length != 0" class="w-full border-2 rounded-md flex justify-between my-2">
        <div class="flex">
            <div class="mx-4">
                <img :src="product.img_url" class="object-cover w-[200px] h-[190px]" />
            </div>
            <div class="flex items-center mx-5">
                <div>
                    <h2 class="font-bold my-2">{{ product.product_name }}</h2>
                    <p class="my-1">$ {{ product.price }}</p>
                    
                </div>
            </div>
        </div>
    
        <div class="my-3 mx-2">
            <button class="border-2 bg-red-500 hover:bg-red-600 rounded-lg border-inherit py-1 px-4 text-white" @click="removeItem(product.product_id)">Remove</button>
        
        </div>
    
    </div>
</div>
</template>

<script>
import Loader from '../components/Loader.vue'
    export default{
        name: 'Watchlist',
        props: ['active'],
       data(){
            return{
                loaded: false,
                products: [],
                
            };
        },
        components: {Loader},
        methods:{
            // takeOutItem(id) {
            //     let watchlist = JSON.parse(localStorage.getItem('watchlist'))
            //     let remove = false
            //     watchlist.forEach(item => {
            //         if (item.id === id) {
            //             item.qty--
            //             if (item.qty === 0) {
            //                 this.removeItem(id)
            //                 remove = true
            //             }
            //         }
            //     })

            //     if (remove) return

            //     this.products.forEach(product => {
            //         if (product.product_id === id) {
            //             product.quantity--
            //             product.total = product.quantity * product.price
            //         }
            //     })

            //     localStorage.setItem('watchlist', JSON.stringify(watchlist))
                
            // },

            removeItem(id) {
                let watchlist = JSON.parse(localStorage.getItem('watchlist'))
                watchlist.forEach((item, index) => {
                    if (item.id === id) {
                        watchlist.splice(index, 1)
                    }
                })

                this.products.forEach((product, index) => {
                    if (product.product_id === id) {
                        this.products.splice(index, 1)
                    }
                })

                if (watchlist.length === 0)  {
                    localStorage.removeItem('watchlist')
                    return
                }
                localStorage.setItem('watchlist', JSON.stringify(watchlist))
                
            }
        },
        async mounted() {
            const watchlist = JSON.parse(localStorage.getItem('watchlist'))
            if (watchlist === null) {
                this.loaded = true
                alert('Watchlist is empty')
                return
            }
            try {
                const response = await axios.post('/api/buyer/watchlist', {watchlist}, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('buyer_token'),
                    }
                })

                console.log(response.data)
                this.products = response.data.products
                localStorage.setItem('watchlist', JSON.stringify(response.data.watchlist))
                this.loaded = true
            } catch (err) {
                // console.log(err)
                console.log(err.response.data)
            }
        }
    }
</script>


