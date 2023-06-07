<template>
    <div class="w-full mx-2 mt-5 mb-2">
        <h1 class="text-2xl">Currently On Sales</h1>
    </div>

    <div v-for="product in products" class="border-2 hover:border-4 my-5 rounded-lg h-[200px] flex flex-row justify-around items-center cursor-pointer hover:bg-gradient-to-r from-white to-blue-100">
        <div class="w-[200px] border-r-2">
            <img :src="product.image" class="w-[190px] cursor-pointer"/>
        </div>
        <div class="w-4/5 pl-7">
            <p class="mb-1">Category:<span class="hover:underline cursor-pointer ml-2">{{product.category}}</span></p>
            <p class="text-2xl hover:underline cursor-pointer mb-5 inline-block">{{ product.name }}</p><br/>
            <span class="cursor-text">Price: {{ toUSCurrency(product.cost) }}</span><br/>
            <span class="cursor-text">Sold: {{product.sold}}, In Stock: {{product.stock}}</span><br/>
            <span class="cursor-text">Total Revenue: {{ toUSCurrency(product.revenue) }}</span>
        </div>
        <div class="w-1/12 h-full flex items-center justify-center">
            <img src="next-arrow.png" class="block scale-50"/>
        </div>
    </div>

</template>

<script>
    export default{
    name: 'SellerHome',
    data(){
        return{
            products: [
                {
                    name: 'Black T-Shirt',
                    cost: 10.99,
                    discount: 5,
                    image: 'Images/Shirt/t-s-b.jpg',
                    category: 'Fashion',
                    sold: 100,
                    stock: 50,
                    revenue: 1100
                },
                {
                    name: 'Man Trouser',
                    cost: 39.99,
                    image: 'Images/Pant/trouser.jpg',
                    category: 'Fashion',
                    sold: 90,
                    stock: 40,
                    revenue: 3600
                },
                {
                    name: 'BLEU DE CHANEL',
                    cost: 129.99,
                    discount: 10,
                    image: 'Images/Beauty/chanel.jpg',
                    category: 'Beauty',
                    sold: 50,
                    stock: 20,
                    revenue: 6300
                }
            ],
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
            ],
            electronic: [
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
            ],
            furniture: [
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
            ],
            tool: [
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
            ],
            other: [
                {
                    name: 'RC Car',
                    cost: 229.99,
                    image: 'Images/Toy/rc_car.jpg'
                },
                {
                    name: 'Water Gun',
                    cost: 19.99,
                    image: 'Images/Toy/watergun.jpg'
                },
                {
                    name: 'BLEU DE CHANEL',
                    cost: 129.99,
                    image: 'Images/Beauty/chanel.jpg'
                },
            ],
            };
        },

    methods: {
        toUSCurrency(num) {
            return num.toLocaleString('en-US', { style: 'currency', currency: 'USD' })
        },
    }
    }
</script>