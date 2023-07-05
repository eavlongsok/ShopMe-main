<template>

            <!-- Promotion -->
            <!-- <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Promotion</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">

                <div v-for="promo in promotions" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">

                    <div class="flex justify-center my-2">
                        <img :src="promo.image" class="object-cover w-[300px] h-[290px]" />
                    </div>

                    <div class="mx-4 my-3">
                        <h2 class="font-bold my-2">{{ promo.name }}</h2>
                        <p class="line-through text-red-500 my-1">$ {{ promo.cost }}</p>
                        <p class="my-1">$ {{ promo.discount }}</p>
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
            </div> -->

            <!-- Fashion -->
            <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Clothing</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">

                <div v-for="promo in fashion" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">

                    <div class="flex justify-center my-2">
                        <img :src="promo.image" class="object-cover w-[300px] h-[290px]" />
                    </div>

                    <div class="mx-4 my-3 py-2">
                        <h2 class="font-bold my-2">{{ promo.name }}</h2>
                        <p class="my-1">$ {{ promo.cost }}</p>
                    </div>

                    <div class="mx-3 my-2 flex justify-between">
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white" @click="addToWatchlist(promo.id)">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white" @click="addToCart(promo.id)">Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Electronic -->
            <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Electronics</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">

                <div v-for="promo in electronic" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">

                    <div class="flex justify-center my-2">
                        <img :src="promo.image" class="object-cover w-[300px] h-[290px]" />
                    </div>

                    <div class="mx-4 my-3 py-2">
                        <h2 class="font-bold my-2">{{ promo.name }}</h2>
                        <p class="my-1">$ {{ promo.cost }}</p>
                    </div>

                    <div class="mx-3 my-2 flex justify-between">
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white" @click="addToWatchlist(promo.id)">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white" @click="addToCart(promo.id)">Cart</button>
                        </div>


                    </div>

                </div>
            </div>

            <!-- Furniture -->
            <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Furniture</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">

                <div v-for="promo in furniture" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">

                    <div class="flex justify-center my-2">
                        <img :src="promo.image" class="object-cover w-[300px] h-[290px]" />
                    </div>

                    <div class="mx-4 my-3 py-2">
                        <h2 class="font-bold my-2">{{ promo.name }}</h2>
                        <p class="my-1">$ {{ promo.cost }}</p>
                    </div>

                    <div class="mx-3 my-2 flex justify-between">
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white" @click="addToWatchlist(promo.id)">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white" @click="addToCart(promo.id)">Cart</button>
                        </div>


                    </div>

                </div>
            </div>
             <!-- Tool -->
             <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Tools And Home Appliances</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">

                <div v-for="promo in tool" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">

                    <div class="flex justify-center my-2">
                        <img :src="promo.image" class="object-cover w-[300px] h-[290px]" />
                    </div>

                    <div class="mx-4 my-3 py-2">
                        <h2 class="font-bold my-2">{{ promo.name }}</h2>
                        <p class="my-1">$ {{ promo.cost }}</p>
                    </div>

                    <div class="mx-3 my-2 flex justify-between">
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white" @click="addToWatchlist(promo.id)">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white" @click="addToCart(promo.id)">Cart</button>
                        </div>


                    </div>

                </div>
            </div>
             <!-- Other -->
             <!-- <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Other</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">

                <div v-for="promo in other" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">

                    <div class="flex justify-center my-2">
                        <img :src="promo.image" class="object-cover w-[300px] h-[290px]" />
                    </div>

                    <div class="mx-4 my-3 py-2">
                        <h2 class="font-bold my-2">{{ promo.name }}</h2>
                        <p class="my-1">$ {{ promo.cost }}</p>
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
            </div> -->

</template>

<script>
    export default{
        name: 'Home',
        data(){
            return{
                // promotions: [
                //     {

                //         name: 'Black T-Shirt',
                //         cost: 10.99,
                //         discount: 5.99,
                //         image: 'Images/Shirt/t-s-b.jpg'
                //     },
                //     {
                //         name: 'Canono AE-1',
                //         cost: 299.99,
                //         discount: 249.99,
                //         image: 'Images/Camera/canon-ae1.jpg'
                //     },
                //     {
                //         name: 'Devoko Gaming Chair',
                //         cost: 279.99,
                //         discount: 239.99,
                //         image: 'Images/Chair/devoko.jpg'
                //     }
                // ],
                fashion: [
                    {
                        id: 29,
                        name: 'Man Shirt',
                        cost: 20.99,
                        image: 'Images/Clothing/m_s.jpg'
                    },
                    {
                        id: 28,
                        name: 'Air Jordan 1',
                        cost: 599.99,
                        image: 'https://i.imgur.com/VZgmlu4.jpg'
                    },
                    {
                        id: 32,
                        name: 'Man Trouser',
                        cost: 25.99,
                        image: 'Images/Clothing/trouser.jpg'
                    },
                ],
                electronic: [
                    {
                        id:43,
                        name: 'MacBook Pro 16 M1',
                        cost: 1499.99,
                        image: 'Images/Electronic/macpro16_m1.jpg'
                    },
                    {
                        id:39,
                        name: 'Dji Mini 2',
                        cost: 899.99,
                        image: 'Images/Electronic/dji_mini2.jpg'
                    },
                    {
                        id:41,
                        name: 'GoPro Hero 11',
                        cost: 599.99,
                        image: 'Images/Electronic/goprohero11.jpg'
                    },
                ],
                furniture: [
                    {
                        id:44,
                        name: 'Coffee Table',
                        cost: 30.99,
                        image: 'Images/Furniture/coffee.jpeg'
                    },
                    {
                        id:46,
                        name: 'Dinner Chair',
                        cost: 10.99,
                        image: 'Images/Furniture/din_chair.jpg'
                    },
                    {
                        id:47,
                        name: 'Couple Bed',
                        cost: 399.99,
                        image: 'Images/Furniture/double.jpg'
                    },
                ],
                tool: [
                    {
                        id:71,
                        name: 'Axe',
                        cost: 30.99,
                        image: 'Images/Tool and Home Appliance/axe.jpg'
                    },
                    {
                        id:74,
                        name: 'Hammer',
                        cost: 6.99,
                        image: 'Images/Tool and Home Appliance/hammer.jpg'
                    },
                    {
                        id:76,
                        name: 'Shovel',
                        cost: 10.99,
                        image: 'Images/Tool and Home Appliance/shovel.jpg'
                    },
                ],

            };
        },
        methods: {
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
        }
    }
</script>