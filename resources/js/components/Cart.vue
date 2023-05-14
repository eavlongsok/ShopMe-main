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
        
        <div class="flex">
            <div class="flex items-center mx-8">
                <div>
                 <!-- plus sign -->
                    <button class="border-2 rounded-md bg-green-400 hover:bg-green-500 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                    </button>
                <!-- minus sign -->
                    <button class="border-2 rounded-md bg-red-400 hover:bg-red-500 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
           
        
            <div class="flex flex-col justify-around mx-3">
                <div>
                    <button class="border-2 bg-red-500 hover:bg-red-600 rounded-lg border-inherit py-1 px-4 text-white">Remove</button>
                </div>
                
                <div>
                    <p>Quantity: {{ promotions.length }}</p>
                </div>
                <div>
                    <p>Total: $ {{ (promotions.length)*buy.discount }}</p>
                </div>
                
            </div>
        </div>
        
    </div>
    <div>
        
    </div>

    <div class="w-full flex justify-center my-2">
        <div>
            <button class="border-2 bg-yellow-300 hover:bg-yellow-400 hover:text-white rounded-lg border-inherit py-1 px-4 text-gray-600 text-lg py-2 px-14">Payment</button>
        </div>
        
    </div>

</template>

<script>

    export default{
        name: 'Cart',
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