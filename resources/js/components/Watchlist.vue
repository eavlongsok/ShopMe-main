<template>
    <div v-for="buy in promotions" class="w-full border-2 rounded-md flex justify-between my-2">
    <div class="flex">
        <div class="mx-4">
            <img :src="buy.image" class="object-cover w-[200px] h-[190px]" />
        </div>
        <div class="flex items-center mx-5">
            <div>
                <h2 class="font-bold my-2">{{ buy.name }}</h2>
                <p class="line-through text-red-500 my-1">$ {{ buy.cost }}</p>
                <p class="my-1">$ {{ buy.discount }}</p>
            </div>
        </div>
        
        
    </div>
    
    <div class="my-3 mx-2">
        <button class="border-2 bg-red-500 hover:bg-red-600 rounded-lg border-inherit py-1 px-4 text-white">Remove</button>
       
    </div>
    
</div>
<div>
    
</div>
</template>

<script>

    export default{
        name: 'Watchlist',
        props: ['active'],
        
        mounted(){
            console.log('hello')
       },
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
                
            };
        },
        
        
    }
</script>


