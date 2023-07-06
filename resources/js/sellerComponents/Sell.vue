<template>
    <p class="text-2xl text-center font-bold mt-7">Enter Product Information</p>
    <div class="flex justify-center mt-7 mb-20">
        <div class="border-2 rounded-md min-w-[400px]">
            <div class="m-3">
                <div>
                    <label class="block my-2">Name:</label>
                    <input type="text" class="border-2 pl-2 rounded-md py-1 focus:outline w-full" v-model="name" :disabled="!isVerified"/>

                    <label class="my-2">Category:</label>
                    <select v-model="category" class="border-2 mt-4 px-2 py-1 rounded-sm focus:outline ml-5" :disabled="!isVerified">
                        <option disabled selected>--Choose Category--</option>
                        <option v-for="category in categories" :value="category.category_id">{{ category.category_name }}</option>
                    </select>

                    <br/>

                    <label class="my-2">Condition:</label>
                    <select v-model="condition" class="border-2 mt-4 px-2 rounded-sm focus:outline ml-5" :disabled="!isVerified">
                        <option selected disabled>--Choose Condition--</option>
                        <option value=1>New</option>
                        <option value=0>Used</option>
                    </select>

                    <div class="flex justify-between mt-4">
                        <div>
                            <label class="block my-2">Price:</label>
                            <input type="number" v-model="price" class="border-2 pl-2 rounded-md py-1 focus:outline" min="1" :disabled="!isVerified"/>
                        </div>

                        <div class="mr-8">
                            <label class="block my-2">Quantity</label>
                            <input type="number" v-model="quantity" class="border-2 pl-2 rounded-md py-1 focus:outline" min="1" :disabled="!isVerified"/>
                        </div>

                    </div>

                    <label class="block my-2 mt-4">Description</label>
                    <textarea class="border-2 pl-2 rounded-md py-1 focus:outline w-full h-[8rem]" v-model="description" :disabled="!isVerified"></textarea>
                </div>

                <div class="my-4">
                    <label
                    class="flex flex-col w-full h-28 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                    <div class="flex flex-col items-center justify-center pt-7">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                            Attach an image</p>
                    </div>
                    <input type="file" ref="image" accept="image/jpeg, image/jpg, image/png" class="opacity-0" :disabled="!isVerified" @change="addImage()" />
                    </label>
                </div>

                <div class="flex justify-end">
                    <div>
                        <button class="border-2 bg-sky-400 hover:bg-sky-500 hover:text-white
                        rounded-md border-inherit py-1 px-6 text-white
                        " @click="submit">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Sell',
        data() {
            return {
                categories: [],
                name: '',
                category: null,
                condition: null,
                price: null,
                quantity: null,
                description: '',
                image: null,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                isVerified: false
            }
        },
        methods: {
            addImage() {
                this.image = this.$refs.image.files[0]

            },
            async submit() {
                try {
                    let formData = new FormData();
                    formData.append("name", this.name)
                    formData.append("category", this.category)
                    formData.append("condition", this.condition)
                    formData.append("price", this.price)
                    formData.append("quantity", this.quantity)
                    formData.append("description", this.description)
                    formData.append("image", this.image);
                    const response = await axios.post('/api/registerProduct', formData, {
                        headers: {
                            "Authorization": "Bearer " + localStorage.getItem("seller_token")
                        }
                    })
                    if (response.data?.success) {
                        // return to another page to see all the pending requests
                        window.location.href = '/'
                    }
                } catch (err) {
                    console.log(err.response.data)
                    alert('Failed to register product. Please try again')
                }
            },
            async getCategories() {
                try {
                    const response = await axios.get('/api/categories', {
                        headers: {
                            "Authorization": "Bearer " + localStorage.getItem("seller_token")
                        }
                    })
                    this.categories = response.data.categories
                }
                catch(err) {
                    console.log(err.response.data)
                }
            },

            async checkIfVerified() {
                try {
                    const response = await axios.get('/api/seller/info', {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('seller_token')
                        }
                    })

                    if (response.data.verified_by === null) {
                        if (response.data.ver_id === null) {
                            alert('You are not verified yet, please fill the request form first, and wait for the admin to verify your request')
                        }
                        else
                            alert('You are not verified yet, please wait for the admin to verify your request')
                    }
                    else {
                        this.isVerified = true
                    }
                }
                catch(err) {
                    console.log(err.response.data)
                }
            },
        },

        async mounted() {
            await this.getCategories()
            await this.checkIfVerified()
        }
    }
</script>