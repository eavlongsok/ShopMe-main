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
                </div>
            </div>
</template>

<script>
    export default{
        name: 'ItemsOnSale',
    }
</script>