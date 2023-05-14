<template>
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
</template>

<script>
    export default{
        name: 'Promotions',
        props: ['active'],
        data(){
            return {
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
                    },
                    {
                        name: 'Wood Bed',
                        cost: 699.99,
                        discount: 579.99,
                        image: 'Images/Bed/wood.jpg'
                    },
                    {
                        name: 'PowerBank',
                        cost: 99.99,
                        discount: 49.99,
                        image: 'Images/Device/powerbank.jpg'
                    }
                ]
            }
        }
    }
</script>