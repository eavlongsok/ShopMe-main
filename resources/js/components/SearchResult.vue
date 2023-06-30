<template>
    <div class="w-full mx-2 my-4 pt-1">
        <div>
            <p class="text-3xl font-bold">Search Result for: "{{ query }}"</p>
        </div>
    </div>

    <div v-if="!loaded" class="flex justify-center items-center h-[700px]">
        <Loader :size="6" :thickness="0.5"/>
    </div>

    <template v-else>
        <div class="px-4 flex justify-end mb-3">
            <label class="text-xl">Categories: </label>
            <select class="rounded-md border-[1px] border-gray-700 pl-2 pr-1 leading-loose mx-1 text-lg capitalize ml-3" v-model="category_id" @change="changeCategory">
                <option disabled selected value=0>All Categories</option>
                <option v-for="category in categories" :value="category.category_id">{{ category.category_name }}</option>
            </select>
        </div>
        <div class="px-4 flex justify-end">
            <label class="text-xl">Sort By: </label>
            <select class="rounded-md border-[1px] border-gray-700 pl-2 pr-1 leading-loose mx-1 text-lg ml-3">
                <option value=1>Highest Price</option>
                <option value=2>Lowest Price</option>
            </select>
        </div>

        <div class="w-full grid grid-cols-3 gap-y-5 gap-x-3 min-h-[900px] mt-7" v-if="products.length > 0">
            <div v-for="product in products" class="border-2 rounded-lg w-[350px] h-[550px] bg-sky-50 text-xl pt-3">

                <div class="flex justify-center my-2">
                    <img :src="product.img_url" class="aspect-square w-[300px] " />
                </div>

                <div class="mx-4 my-3 py-2 h-1/4">
                    <h2 class="font-bold my-2 break-words max-h-[75%] overflow-hidden">{{product.product_name}}</h2>
                    <p class="my-1">${{ toUSCurrency(product.price) }}</p>
                </div>

                <div class="mx-3 my-2 flex justify-between items-end">
                    <div>
                        <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-3 text-white">Watchlist</button>
                    </div>
                    <div>
                        <button class="border-2 bg-green-500 hover:bg-green-400 rounded-lg border-inherit py-1 px-5 text-white">Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="flex justify-center items-center h-[550px]">
                <p class="text-3xl font-bold">No Products Found</p>
        </div>
    </template>
</template>

<script>
    import Loader from './Loader.vue'
    export default {
        name: 'Search Result',
        data(){
            return {
                query: '',
                category_id: 0,
                page: 1,
                limit: 9,
                products: [],
                loaded: false,
                categories: [],
            }
        },
        components: {
            Loader
        },
        methods: {
            toUSCurrency(num) {
                return num.toLocaleString("en-US", {style:"currency", currency:"USD"});
            },
            changeCategory() {
                let params = new URLSearchParams()
                params.set('q', this.query)
                params.set('cate', this.category_id)
                params.set('page', this.page)
                window.location.href = "/search?" + params.toString()

            },
            async search() {
                this.products = []
                this.loaded = false
                let params = new URLSearchParams()
                params.append('q', this.query)
                params.append('category_id', this.category_id)
                params.append('page', this.page)
                params.append('limit', this.limit)

                try {
                    const response = await axios.get('/api/search', {
                        params,
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('buyer_token')
                        }
                    })
                    console.log(response.data)
                    this.products = response.data.products

                } catch(err) {
                    console.log(err.response.data)
                }

                this.loaded = true
            },
            async getCategories() {
                try {
                    const response = await axios.get('/api/categories', {
                        headers: {
                            "Authorization": "Bearer " + localStorage.getItem("buyer_token")
                        }
                    })
                    this.categories = response.data.categories
                }
                catch(err) {
                    console.log(err.response.data)
                }
            },
        },
        async mounted() {
            // add if exists
            const params = window.location.search
            const searchParams = new URLSearchParams(params.substring(params.indexOf('?')))
            this.query = searchParams.get('q')
            if (searchParams.has('cate')) {
                this.category_id = searchParams.get('cate')
            }
            if (searchParams.has('page')) {
                this.page = searchParams.get('page')
            }

            await this.getCategories();
            await this.search()
        }

    }
</script>