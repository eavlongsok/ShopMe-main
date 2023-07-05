<template>
    <div class="min-h-[900px]">
        <div v-if="!loaded" class="flex justify-center items-center h-[700px]">
            <Loader :size="4" :thickness="0.4"/>
        </div>
        <div v-for="product in products" :key="product.product_id" v-else-if="loaded && products.length != 0" class="w-full border-2 rounded-md flex justify-between my-2">
            <div class="flex">
                <div class="mx-4">
                    <img :src="product.img_url" class="aspect-square w-[200px] h-[190px]" />
                </div>
                <div class="flex items-center mx-5">
                    <div>
                        <h2 class="font-bold my-2">{{ product.product_name }}</h2>
                        <!-- <p class="line-through text-red-500 my-1">$ {{ product.price }}</p> -->
                        <p class="my-1">${{product.price}}</p>
                    </div>
                </div>


            </div>

            <div class="flex">
                <div class="flex items-center mx-8">
                    <div>
                    <!-- plus sign -->
                        <button class="border-2 rounded-md bg-green-400 hover:bg-green-500 mx-1" @click="addItem(product.product_id)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                        </button>
                    <!-- minus sign -->
                        <button class="border-2 rounded-md bg-red-400 hover:bg-red-500 mx-1" @click="takeOutItem(product.product_id)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>


                <div class="flex flex-col justify-around mx-3">
                    <div>
                        <button class="border-2 bg-red-500 hover:bg-red-600 rounded-lg border-inherit py-1 px-4 text-white" @click="removeItem(product.product_id)">Remove</button>
                    </div>
                    <div>
                        <p>Quantity: {{ product.quantity }}</p>
                            <!-- overrode total quantity for quantity in cart -->
                    </div>
                    <div>
                        <p>Total: $ {{ product.total }}</p>
                    </div>

                </div>
            </div>

        </div>

        <template v-if="loaded && products.length != 0">
            <div class="w-full border-2 rounded-md flex justify-center my-2">
                <div class="py-8">
                    <h1 class="text-3xl">Total: $ {{ total }} </h1>
                </div>
            </div>

            <div class="w-full flex justify-center my-2">
                <div>
                    <button class="border-2 bg-yellow-300 hover:bg-yellow-400 hover:text-white
                    rounded-lg border-inherit px-4 text-gray-600
                    text-lg py-2 px-18" @click="payment">Payment</button>
                </div>

            </div>
        </template>
    </div>

</template>

<script>
    import Loader from '../components/Loader.vue'
    export default{
        name: 'Cart',
       data(){
            return{
                total: 0,
                loaded: false,
                products: [],
            };
        },

        components: {Loader},

        methods: {
            passID(tabID){
                this.$emit('changetab',tabID)
            },
            calculateTotal() {
                console.log('hi')
                console.log(this.products)
                let total = 0
                this.products.forEach(product => {
                    total += product.total
                })
                this.total = total
            },
            addItem(id) {
                let cart = JSON.parse(localStorage.getItem('cart'))
                cart.forEach(item => {
                    if (item.id === id) {
                        item.qty++
                    }
                })

                this.products.forEach(product => {
                    if (product.product_id === id) {
                        product.quantity++
                        product.total = product.quantity * product.price
                    }
                })

                localStorage.setItem('cart', JSON.stringify(cart))
                this.calculateTotal()
            },

            takeOutItem(id) {
                let cart = JSON.parse(localStorage.getItem('cart'))
                let remove = false
                cart.forEach(item => {
                    if (item.id === id) {
                        item.qty--
                        if (item.qty === 0) {
                            this.removeItem(id)
                            remove = true
                        }
                    }
                })

                if (remove) return

                this.products.forEach(product => {
                    if (product.product_id === id) {
                        product.quantity--
                        product.total = product.quantity * product.price
                    }
                })

                localStorage.setItem('cart', JSON.stringify(cart))
                this.calculateTotal()
            },

            removeItem(id) {
                let cart = JSON.parse(localStorage.getItem('cart'))
                cart.forEach((item, index) => {
                    if (item.id === id) {
                        cart.splice(index, 1)
                    }
                })

                this.products.forEach((product, index) => {
                    if (product.product_id === id) {
                        this.products.splice(index, 1)
                    }
                })

                if (cart.length === 0)  {
                    localStorage.removeItem('cart')
                    return
                }
                localStorage.setItem('cart', JSON.stringify(cart))
                this.calculateTotal()
            },
            async payment(){
            
                try {
                let cart = JSON.parse(localStorage.getItem('cart'))
                const response = await axios.post('/api/buyer/payment', {cart}, {headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('buyer_token'),
                }})
                
                console.log(response)

                } catch(err) {
                    console.log(err.response)
                }
            }
        },
        async mounted() {
            const cart = JSON.parse(localStorage.getItem('cart'))
            if (cart === null) {
                this.loaded = true
                alert('Cart is empty')
                return
            }
            try {
                const response = await axios.post('/api/buyer/cart', {cart}, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('buyer_token'),
                    }
                })

                console.log(response.data)
                this.products = response.data.products
                this.calculateTotal()
                localStorage.setItem('cart', JSON.stringify(response.data.cart))
                this.loaded = true
            } catch (err) {
                // console.log(err)
                console.log(err.response.data)
            }
        }


    }
</script>