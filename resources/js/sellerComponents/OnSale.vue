<template>
    <div class="cursor-pointer z-10 mt-4 mb-7" @click="$emit('changetab', 1)">
        <img src="back-arrow.png" width="16" class="inline-block">
        <span class="text-lg align-middle ml-2 underline hover:font-bold">Back</span>
    </div>
    <div class="flex justify-center items-start text-lg mt-16 mb-24 w-full">
        <div class="min-h-[24rem] w-2/5 flex justify-center items-center">
            <div class="w-[70%] flex flex-col justify-center items-center gap-y-5">
                <div class="w-full relative wrapper">
                <img :src="product.img_url" class="w-full aspect-square border-[1px] border-gray-700"/>
                <label for="img">
                    <div class="profile-hover text-lg" >
                        Change Image
                    </div>
                </label>
                <input type="file" class="hidden" name="img" id="img" @change="changeProductImage()" ref="img" accept="image/png, image/jpeg" />
            </div>
                <button class="left-btn bg-blue-500 text-gray-100 hover:bg-blue-700 hover:text-white" @click="$emit('changetab', 12)">Edit Product</button>
                <button class="left-btn bg-green-500 text-gray-100 hover:bg-green-700 hover:text-white" v-if="!addProduct" @click="addProduct = true;">Add Product</button>
                <div v-else>
                    <p class="text-red-500 text-sm text-center mb-2" v-if="errors !== null && errors?.quantity">{{ errors.quantity[0] }}</p>
                    <div class="flex justify-center items-center gap-x-2">
                        <label>Add:</label>
                        <input type="number" min="1" class="w-1/2 ml-2 border-2 rounded-md px-2 py-1 focus:outline border-gray-500" v-model="quantity" @keyup="($event) => {
                            if ($event.key === 'Enter') {
                                addProductQuantity()
                            }
                        }"/>
                        <button class="left-btn bg-green-500 text-gray-100 hover:bg-green-700 hover:text-white !w-1/4" @click="addProductQuantity">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-[24rem] w-5/12">
            <div class="text-side">
                <div class="col-one">ID:</div>
                <div class="col-two">{{ product.product_id }}</div>

                <div class="col-one">category:</div>
                <div class="col-two">{{ product.category_name }}</div>

                <div class="col-one">name:</div>
                <div class="col-two">{{ product.product_name }}</div>

                <div class="col-one">condition:</div>
                <div class="col-two">{{ product.condition === 1 ? 'New' : 'Used' }}</div>

                <div class="col-one">price:</div>
                <div class="col-two">{{ formattedPrice }}</div>

                <div class="col-one">in stock:</div>
                <div class="col-two">{{ formattedQuantity }}</div>

                <div class="col-one">sold:</div>
                <div class="col-two">{{ formattedSold }}</div>

                <div class="col-one">description:</div>
                <div class="col-two leading-tight">{{ product.product_description }}</div>

                <div class="col-one">requested at:</div>
                <div class="col-two leading-tight">{{ product.created_at }}</div>

                <div class="col-one">last updated:</div>
                <div class="col-two leading-tight">{{ product.updated_at }}</div>

                <div class="col-one">approved at:</div>
                <div class="col-two leading-tight">{{ product.approved_at }}</div>

            </div>
            <div class="flex items-center justify-center mt-5">
                <button class="w-4/5 bg-red-500 hover:bg-red-700 hover:text-gray-200 text-white border-2 border-black p-1 rounded-lg" @click="removeProduct">Remove product permanently</button>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                addProduct: false,
                quantity: 1,
                errors: null
            }
        },
        props: ['product'],
        methods: {
            formatToCurrency(amount){
                const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                });
                return formatter.format(amount);
            },
            async changeProductImage() {
                const formData = new FormData()
                formData.append('product_id', this.product.product_id)
                formData.append('img', this.$refs.img.files[0])

                try {
                    const response = await axios.post('/api/seller/product/editImage', formData, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                        }
                    })
                    if (response.data?.success) {
                        this.product.img_url = response.data.img_url
                        console.log(this.product.img_url)
                    }
                } catch(err) {
                    console.log(err.response)
                }
            },
            async addProductQuantity() {
                let formData = new FormData()
                formData.append('product_id', this.product.product_id)
                formData.append('quantity', this.quantity)

                try {
                    const response = await axios.post('/api/seller/addProduct',
                    formData, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                    }})

                    console.log(response.data)
                    if (response.data?.success) {
                        alert('Product added successfully')
                        window.location.reload()
                    }
                } catch(err) {
                    this.errors = err.response.data.errors
                }
            },
            async removeProduct() {
                let confirmation = confirm('Are you sure you want to remove this product?')
                if (!confirmation) return

                let formData = new FormData()
                formData.append('product_id', this.product.product_id)

                try {
                    const response = await axios.post('/api/seller/removeProduct', formData, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                        }
                    })

                    if (response.data?.success) {
                        alert('Product removed successfully')
                        this.$emit('changetab', 1)
                    }
                }
                catch(err) {
                    console.log(err.response)
                }
            }
        },
        emits: ['changetab'],
        computed: {
            formattedPrice () {
                return this.formatToCurrency(this.product.price)
            },
            formattedQuantity () {
                return this.product.quantity.toLocaleString('en-US')
            },
            formattedSold () {
                return this.product.product_sold.toLocaleString('en-US')
            }
        }
    }
</script>

<style scoped>
    .col-one {
        @apply text-gray-800 font-bold capitalize justify-self-end text-end;
    }

    .col-two {
        @apply col-span-2;
    }

    .text-side {
        @apply grid grid-cols-3 gap-x-4 gap-y-1 justify-between text-lg my-2;
    }

    .left-btn {
        @apply w-4/5 p-1 border-2 border-black rounded-lg;
    }

    .wrapper:hover .profile-hover {
        opacity: 1;
    }
    .profile-hover {
        @apply absolute text-blue-300 top-0 left-0 cursor-pointer font-bold flex justify-center items-center h-full w-full opacity-0 z-10;

        transition: opacity 0.1s ease-in-out;
    }

    .wrapper:hover img {
        filter: blur(2px);
    }
</style>