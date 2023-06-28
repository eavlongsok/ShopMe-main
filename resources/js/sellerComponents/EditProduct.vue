<template>
    <div class="cursor-pointer z-10 mt-4 mb-5" @click="$emit('changetab', 11)">
        <img src="back-arrow.png" width="16" class="inline-block">
        <span class="text-lg align-middle ml-2 underline hover:font-bold">Back</span>
    </div>
    <div class="w-2/5 py-10 border-[1px] border-gray-800 mx-auto mb-16">
        <h1 class="text-2xl text-center font-bold">Edit Product Information</h1>

        <div class="w-4/5 mx-auto mt-4">
            <label class="my-2">Name: </label>
            <span class="text-red-500 text-sm" v-if="errors !== null && errors.hasOwnProperty('name')">{{ errors.name[0] }}</span>
            <br/>
            <input type="text" class="border-2 pl-2 rounded-md py-1 focus:outline w-full mt-2" v-model="name"/>

            <label class="my-2">Category:</label>
            <select class="border-2 w-1/3 mt-4 px-2 py-1 rounded-md focus:outline ml-5 hover:border-red-500" disabled title="Not editable">
                <option selected>{{ product.category_name }}</option>
            </select><br/>

            <label class="my-2">Condition:</label>
            <select class="border-2 w-1/3 mt-4 px-2 py-1 rounded-md focus:outline ml-5 hover:border-red-500" disabled title="Not editable">
                <option selected>{{ product.product_condition === 1 ? 'New' : 'Old' }}</option>
            </select><br/>

            <label class="my-2">Price: </label>
            <input type="number" v-model="price" class="ml-5 mr-2 w-1/3 border-2 pl-2 mt-4 rounded-md py-1 focus:outline" min="1"/>
            <span class="text-red-500 text-sm" v-if="errors !== null && errors.hasOwnProperty('price')">{{ errors.price[0] }}</span>
            <br/>

            <label class="my-2 mt-4">Description: </label>
            <span class="text-red-500 text-sm" v-if="errors !== null && errors.hasOwnProperty('description')">{{ errors.description[0] }}</span>
            <br/>
            <textarea class="mt-4 border-2 pl-2 rounded-md py-1 focus:outline w-full h-[8rem]" v-model="description"></textarea>

            <button class="border-2 bg-sky-400 hover:bg-sky-500 hover:text-white
            rounded-md border-inherit py-1 px-6 text-white mt-5" @click="submit">Submit</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                price: 0,
                description: '',
                errors: null
            }
        },
        props: ['product'],
        emits: ['changetab'],
        computed: {
            product_name() {
                return this.product.product_name
            },
            product_price() {
                return this.product.price
            },
            product_description() {
                return this.product.product_description
            },
        },
        methods: {
            async submit() {
                try {
                    let formData = new FormData()
                    formData.append('product_id', this.product.product_id)
                    formData.append('name', this.name)
                    formData.append('price', this.price)
                    formData.append('description', this.description)

                    const response = await axios.post('/api/seller/editProductInfo', formData, {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('seller_token')}`
                        }
                    })

                    if (response.data?.success) {
                        alert('Product information updated successfully')
                        this.$emit('changetab', 1)
                    }
                }
                catch(err) {
                    this.errors = err.response.data.errors
                    console.log(this.errors)
                    // console.log(err.response )
                }
            }
        },
        mounted() {
            this.name = this.product.product_name
            this.price = this.product.price
            this.description = this.product.product_description
        },
    }
</script>

<style scoped>

</style>