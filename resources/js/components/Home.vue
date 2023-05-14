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
                <h1 class="text-2xl">Fashion</h1>
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
                <h1 class="text-2xl">Electronic</h1>
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
             <!-- <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Tool</h1>
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
            </div> -->
             <!-- Other -->
             <div class="w-full mx-2 my-3">
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
            </div>
        
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
                        cost: 49.99,
                        image: 'Images/Shirt/m_s.jpg'
                    },
                    {
                        name: 'Woman Top',
                        cost: 59.99,
                        image: 'Images/Shirt/w_t.jpeg'
                    },
                    {
                        name: 'Man Trouser',
                        cost: 39.99,
                        image: 'Images/Pant/trouser.jpg'
                    },
                ],
                electronic: [
                    {
                        name: 'MacBook Air M2',
                        cost: 1299.99,
                        image: 'Images/PC/macair_m2.jpeg'
                    },
                    {
                        name: 'Sony A7',
                        cost: 359.99,
                        image: 'Images/Camera/sony_a7.jpg'
                    },
                    {
                        name: 'Wireless Headphone',
                        cost: 239.99,
                        image: 'Images/Device/wireless.jpg'
                    },
                ],
                furniture: [
                    {
                        name: 'Small Table',
                        cost: 129.99,
                        image: 'Images/Table/coffee.jpeg'
                    },
                    {
                        name: 'Dinner Chair',
                        cost: 59.99,
                        image: 'Images/Chair/din_chair.jpg'
                    },
                    {
                        name: 'Double People Bed',
                        cost: 449.99,
                        image: 'Images/Bed/double.jpg'
                    },
                ],
                tool: [
                    {
                        name: 'Soccer Shoes',
                        cost: 269.99,
                        image: 'Images/Sport/football.jpg'
                    },
                    {
                        name: 'Hammer',
                        cost: 5.99,
                        image: 'Images/Home/hammer.jpg'
                    },
                    {
                        name: 'Gskyer Telescope',
                        cost: 529.99,
                        image: 'Images/Science/Gskyer.jpg'
                    },
                ],
                other: [
                    {
                        name: 'RC Car',
                        cost: 229.99,
                        image: 'Images/Toy/rc_car.jpg'
                    },
                    {
                        name: 'Water Gun',
                        cost: 19.99,
                        image: 'Images/Toy/watergun.jpg'
                    },
                    {
                        name: 'BLEU DE CHANEL',
                        cost: 129.99,
                        image: 'Images/Beauty/chanel.jpg'
                    },
                ],
                
            };
        },
    }
</script>