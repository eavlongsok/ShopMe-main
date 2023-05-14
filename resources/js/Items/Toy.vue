<template>
    <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Toy</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">
                
                <div v-for="promo in toy" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
                    
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
        name: 'Toy',
        props: ['active'],
        data(){
            return {
                toy: [
                    {
                        name: 'RC Car',
                        cost: 129.99,
                        image: 'Images/Toy/rc_car.jpg'
                    },
                    {
                        name: 'Water Gun',
                        cost: 19.99,
                        image: 'Images/Toy/watergun.jpg'
                    },
                    {
                        name: 'RC Helicopter',
                        cost: 239.99,
                        image: 'Images/Toy/rc_coper.jpg'
                    },
                    {
                        name: 'Lego Car',
                        cost: 9.99,
                        image: 'Images/Toy/lego_car.jpg'
                    }
                ]
            }
        }
    }
</script>