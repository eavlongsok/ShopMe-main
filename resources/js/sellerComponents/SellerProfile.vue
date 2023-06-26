<template>
    <div v-if="loading" class="w-full h-[90vh] flex justify-center items-center">
        <Loader :size="5" :thickness="0.5"/>
    </div>
    <div v-else-if="!loading" class="w-full h-[90vh] grid grid-cols-2 gap-x-24 justify-center">
        <div class="h-full flex flex-col gap-y-8 justify-center items-center">
            <div class="w-3/5 relative wrapper">
                <img :src="seller.img_url" class="w-full rounded-[50%] aspect-square inline-block border-[1px] border-black shadow-lg"/>
                <label for="logo">
                    <div class="profile-hover text-lg" >
                        Change Profile Picture
                    </div>
                </label>
                <input type="file" class="hidden" name="logo" id="logo" @change="changeLogo()" ref="logo" accept="image/png, image/jpeg" />
            </div>

            <p class="text-2xl font-bold">{{seller.first_name}} {{ seller.last_name }}</p>
            <button class="bg-white w-4/5 p-3 mt-5 text-center rounded-lg border-2 border-gray-500 ml-5 text-xl hover:bg-blue-100" @click="$emit('changetab', 9)">Edit Account Information</button>
        </div>
        <div class="h-full flex flex-col indent-10 min-w-[25rem] justify-center text-xl gap-y-5">
            <p><span class="font-bold capitalize">Name: </span>{{ seller.first_name }} {{ seller.last_name }}</p>
            <p><span class="font-bold capitalize">Email: </span>{{seller.email}}</p>
            <p><span class="font-bold capitalize">Date Of Birth: </span>{{ seller.date_of_birth }}</p>
            <p><span class="font-bold capitalize">Verified: </span>{{seller.verified_by != null ? 'Yes' : 'No'}}</p>
            <p v-if="seller.verified_by === null"><span class="font-bold capitalize">Verification Requested: </span>{{seller.ver_id !== null ? 'Yes' : 'No'}}</p>
            <p v-if="seller.ver_id !== null"><span class="font-bold capitalize">Store Name: </span>{{seller.store_name}}</p>
            <p v-if="seller.ver_id !== null"><span class="font-bold capitalize">Store Information: </span>{{seller.business_info}}</p>
        </div>
    </div>
</template>

<script>
    import Loader from '../components/Loader.vue'
    export default {
        data() {
            return {
                loading: true,
                seller: {}
            }
        },
        components: {Loader},
        emits: ['changetab'],
        methods: {
            async changeLogo() {
                console.log(this.$refs.logo.files[0])
                const formData = new FormData()
                formData.append('logo', this.$refs.logo.files[0])

                try {
                    const response = await axios.post('/api/seller/editLogo', formData, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                        }
                    })
                    if (response.data?.success) {
                        this.seller.img_url = response.data.img_url
                        console.log(this.seller.img_url)
                    }
                } catch(err) {
                    console.log(err.response)
                }
            }
        },
        async mounted() {
            try {
                const response = await axios.get('/api/seller/info', {headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                }})
                this.seller = response.data
                console.log(this.seller)

            } catch(err) {
                console.log(err.response)
            }
            this.loading = false
        }
    }
</script>

<style scoped>

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