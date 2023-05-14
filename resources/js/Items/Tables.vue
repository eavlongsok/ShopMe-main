<template>
    <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Table</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">
                
                <div v-for="promo in table" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
                    
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
        name: 'Tables',
        props: ['active'],
        data(){
            return {
                table: [
                    {
                        name: 'Small Table',
                        cost: 129.99,
                        image: 'Images/Table/coffee.jpeg'
                    },
                    {
                        name: 'Glass Table',
                        cost: 99.99,
                        image: 'Images/Table/glass.jpg'
                    },
                    {
                        name: 'Round Table',
                        cost: 29.99,
                        image: 'Images/Table/round.jpeg'
                    },
                    {
                        name: 'Steel Table',
                        cost: 19.99,
                        image: 'Images/Table/steel.jpg'
                    },
                    {
                        name: 'Table 1',
                        cost: 9.99,
                        image: 'Images/Table/t1.jpg'
                    },
                    {
                        name: 'Table 2',
                        cost: 12.99,
                        image: 'Images/Table/write.jpg'
                    }
                ]
            }
        }
    }
</script>