<template>
    <div class="w-full mx-2 my-4 pt-1 flex justify-between">
        <div>
            <p class="text-lg">Search Result for #</p>
        </div>
        
        <div class="px-6">
            <label class="text-lg">Sort By: </label>
            <select class="rounded-md border-[1px] border-gray-700 pl-2 pr-1 leading-loose mx-1 text-lg">
                <option value=1>Highest Price</option>
                <option value=2>Lowest Price</option>
            </select>
        </div>
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
</template>

<script>
    export default {
        name: 'Search Result',
        data(){
            return{
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
                ]
            }
        },

    }
</script>