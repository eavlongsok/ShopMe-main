<template>
    <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Shirt</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">
                
                <div v-for="product in products" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
                    <div class="flex justify-center my-2">
                        <img :src="product.img_url" class="object-cover w-[300px] h-[290px]" />
                    </div>
                    
                    <div class="mx-4 my-3 py-2">
                        <h2 class="font-bold my-2">{{ product.product_name }}</h2>
                        <p class="my-1">$ {{ product.price }}</p>
                    </div>

                    <div class="mx-3 my-2 flex justify-between">
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white">Cart</button>
                        </div>
                    </div>
                    
                </div> 
            </div>
</template>

<script>
    export default{
        name: 'Shirt',
        props: ['active'],
        data(){
            return {

                products:[],

            }
        },
       async mounted(){
            let params = new URLSearchParams()
            params.append('category', 1)
        try{
            const response = await axios.get('/api/buyer/product/', {
                    params,
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem("buyer_token")
                    }
                })
            this.products = response.data.products
        }
        catch(err){
            console.log(err.response.data)
        }
       },
    }
</script>