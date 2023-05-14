<template>
    <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">PC</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">
                
                <div v-for="promo in pc" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
                    
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
        name: 'PC',
        props: ['active'],
        data(){
            return {
                pc: [
                    {
                        name: 'Asus Zenbook 15',
                        cost: 1569.99,
                        image: 'Images/PC/asus_zenbook15.png'
                    },
                    {
                        name: 'Lenovo Legion 5',
                        cost: 1599.99,
                        image: 'Images/PC/lenovo_legion5.jpg'
                    },
                    {
                        name: 'MacBook Air M2',
                        cost: 1299.99,
                        image: 'Images/PC/macair_m2.jpeg'
                    },
                    {
                        name: 'MacBook Pro 16 M1',
                        cost: 1399.99,
                        image: 'Images/PC/macpro16_m1.jpg'
                    },
                    {
                        name: 'ROG Strix G15',
                        cost: 1699.99,
                        image: 'Images/PC/rog_strixG15.jpg'
                    },
                    {
                        name: 'ROG Strix Scar 17',
                        cost: 1699.99,
                        image: 'Images/PC/rog_strixScar17.jpg'
                    }
                ]
            }
        }
    }
</script>