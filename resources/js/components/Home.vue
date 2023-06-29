<template>

            <!-- Promotion -->
            <div class="w-full mx-2 my-3">
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
            </div>

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
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white">Cart</button>
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
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white">Cart</button>
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
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white">Cart</button>
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
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white">Watchlist</button>
                        </div>
                        <div>
                            <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white">Cart</button>
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
                promotions: [
                    {
                        name: 'Black T-Shirt',
                        cost: 10.99,
                        discount: 5.99,
                        image: 'Images/Shirt/t-s-b.jpg'
                    },
                    {
                        name: 'Canono AE-1',
                        cost: 299.99,
                        discount: 249.99,
                        image: 'Images/Camera/canon-ae1.jpg'
                    },
                    {
                        name: 'Devoko Gaming Chair',
                        cost: 279.99,
                        discount: 239.99,
                        image: 'Images/Chair/devoko.jpg'
                    }
                ],
                fashion: [
                    {
                        name: 'Man Shirt',
                        cost: 20.99,
                        image: 'Images/Clothing/m_s.jpg'
                    },
                    {
                        name: 'Woman Shirt',
                        cost: 20.99,
                        image: 'Images/Clothing/w_t.jpeg'
                    },
                    {
                        name: 'Man Trouser',
                        cost: 25.99,
                        image: 'Images/Clothing/trouser.jpg'
                    },
                ],
                electronic: [
                    {
                        name: 'MacBook Air M2',
                        cost: 1499.99,
                        image: 'Images/Electronic/macpro16_m1.jpg'
                    },
                    {
                        name: 'Dji Mini 2',
                        cost: 899.99,
                        image: 'Images/Electronic/dji_mini2.jpg'
                    },
                    {
                        name: 'GoPro Hero 11',
                        cost: 599.99,
                        image: 'Images/Electronic/goprohero11.jpg'
                    },
                ],
                furniture: [
                    {
                        name: 'Coffee Table',
                        cost: 30.99,
                        image: 'Images/Furniture/coffee.jpeg'
                    },
                    {
                        name: 'Dinner Chair',
                        cost: 10.99,
                        image: 'Images/Furniture/din_chair.jpg'
                    },
                    {
                        name: 'Couple Bed',
                        cost: 399.99,
                        image: 'Images/Furniture/double.jpg'
                    },
                ],
                tool: [
                    {
                        name: 'Axe',
                        cost: 30.99,
                        image: 'Images/Tool and Home Appliance/axe.jpg'
                    },
                    {
                        name: 'Hammer',
                        cost: 6.99,
                        image: 'Images/Tool and Home Appliance/hammer.jpg'
                    },
                    {
                        name: 'Shovel',
                        cost: 10.99,
                        image: 'Images/Tool and Home Appliance/shovel.jpg'
                    },
                ],

            };
        },
    }
</script>