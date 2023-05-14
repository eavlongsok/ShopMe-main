<template>
    <div class="w-full mx-2 my-3">
                <h1 class="text-2xl">Camera</h1>
            </div>
            <div  class="w-full grid grid-cols-3 my-3">
                
                <div v-for="promo in camera" class="border-2 rounded-lg w-[350px] h-[450px] mx-2 my-5 bg-sky-50">
                    
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
        name: 'Camera',
        props: ['active'],
        data(){
            return {
                camera: [
                    {
                        name: 'DJI Mini 2',
                        cost: 569.99,
                        image: 'Images/Camera/dji_mini2.jpg'
                    },
                    {
                        name: 'Canon EOS RP',
                        cost: 699.99,
                        image: 'Images/Camera/eos_rp.jpg'
                    },
                    {
                        name: 'Fuji x100v',
                        cost: 499.99,
                        image: 'Images/Camera/fuji_x100v.jpg'
                    },
                    {
                        name: 'GoPro Hero 11',
                        cost: 379.99,
                        image: 'Images/Camera/goprohero11.jpg'
                    },
                    {
                        name: 'Sony A7',
                        cost: 359.99,
                        image: 'Images/Camera/sony_a7.jpg'
                    }
                ]
            }
        }
    }
</script>