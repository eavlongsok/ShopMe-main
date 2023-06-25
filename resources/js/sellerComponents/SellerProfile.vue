<template>
    <div v-if="loading" class="w-full h-[90vh] flex justify-center items-center">
        <Loader :size="5" :thickness="0.5"/>
    </div>
    <div v-else-if="!loading" class="w-full h-[90vh] grid grid-cols-2 gap-x-24 justify-center">
        <div class="h-full flex flex-col gap-y-8 justify-center items-center">
            <img src="/Images/Camera/canon-ae1.jpg" class="w-3/5 rounded-[50%] aspect-square inline-block border-[1px] border-black shadow-lg"/>
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

</style>