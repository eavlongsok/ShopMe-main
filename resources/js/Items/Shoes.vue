<template>
    <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Shoes</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">
                
                <div v-for="promo in shoes" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
                    
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
        name: 'Shoes',
        props: ['active'],
        data(){
            return {
                shoes: [
                    {
                        name: 'Air Force 1',
                        cost: 229.99,
                        image: 'Images/Shoes/air_force1.jpeg'
                    },
                    {
                        name: 'Air Jordan 1',
                        cost: 399.99,
                        image: 'Images/Shoes/air_jordan1.jpg'
                    },
                    {
                        name: 'Flip Flop',
                        cost: 2.99,
                        image: 'Images/Shoes/flip.jpeg'
                    },
                    {
                        name: 'Man Shoes',
                        cost: 99.99,
                        image: 'Images/Shoes/m_shoes.png'
                    },
                    {
                        name: 'Woman Boot',
                        cost: 67.99,
                        image: 'Images/Shoes/w_boot.jpg'
                    },
                    {
                        name: 'Woman Shoes',
                        cost: 36.99,
                        image: 'Images/Shoes/w_shoes.jpeg'
                    }
                ]
            }
        }
    }
</script>