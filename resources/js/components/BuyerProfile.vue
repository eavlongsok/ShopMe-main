<template>
    <div v-if="loading" class="w-full h-[90vh] flex justify-center items-center">
        <Loader :size="5" :thickness="0.5"/>
    </div>
    <div v-else-if="!loading" class="w-full h-[90vh] grid grid-cols-2 gap-x-24 justify-center">
        <div class="h-full flex flex-col gap-y-8 justify-center items-center">
            <img src="/Images/Camera/canon-ae1.jpg" class="w-3/5 rounded-[50%] aspect-square inline-block border-[1px] border-black shadow-lg"/>
            <p class="text-2xl font-bold">{{buyer.first_name}} {{ buyer.last_name }}</p>
            <button class="bg-white w-4/5 p-3 mt-5 text-center rounded-lg border-2 border-gray-500 ml-5 text-xl hover:bg-blue-100" @click="$emit('changetab', 9)">Edit Account Information</button>
        </div>
        <div class="h-full flex flex-col indent-10 min-w-[25rem] justify-center text-xl gap-y-5">
            <p><span class="font-bold capitalize">Name: </span>{{ buyer.first_name }} {{ buyer.last_name }}</p>
            <p><span class="font-bold capitalize">Email: </span>{{buyer.email}}</p>
            <p><span class="font-bold capitalize">Date Of Birth: </span>{{ buyer.date_of_birth }}</p>
            <p><span class="font-bold capitalize">Created At: </span>{{ buyer.created_at }}</p>
        </div>
    </div>
</template>

<script>
    import Loader from './Loader.vue'
    export default {
        data() {
            return {
                loading: true,
                buyer: {}
            }
        },
        components: {Loader},
        emits: ['changetab'],
        async mounted() {
            try {
                const response = await axios.get('/api/buyer/info', {headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('buyer_token'),
                }})
                this.buyer = response.data
                console.log(this.buyer)

            } catch(err) {
                console.log(err.response)
            }
            this.loading = false
        }
    }
</script>

<style scoped>

</style>