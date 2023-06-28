<template>
    <div class="md:flex bg-sky-400 justify-evenly py-2.5 md:items-center">

        <div class="flex mx-3 cursor-pointer" @click="emitTabEvent(1)">
            <img src="Logo/logo-no-background.svg" alt="logo"/>
        </div>

        <span @click="showMenu = !showMenu" class="absolute md:hidden right-6 top-5 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
       </span>

        <div class="w-6/12 mx-2.5 relative">
            <input tpye="search" placeholder="Search Product" aria-label="Search Product"  :class="showMenu ? 'flex': 'hidden'"
            class="w-full mx-2.5 mt-4 mb-4 space-y-4 md:mt-0 md:mb-0 md:space-y-0 md:flex flex-col  md:flex-row rounded-md px-3 py-2
            placeholder-gray-500 border-none ring-2 ring-gray-300 focus:ring-gray-500 focus:ring-2 text-black focus:outline-none" v-model="query"/>
            <button type="button" class="inline-block absolute right-[-8px] outline-none top-0 h-10 w-10"><img src="searchicon.svg" width="25" class="mx-auto"/></button>

        </div>


        <div class="mx-3 ">

            <ul :class="showMenu ? 'flex': 'hidden'" class="flex-col mt-1 space-y-4 md:flex md:flex-row md:items-center md:space-y-0 ">
            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(1)">Home</li>

            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(2)">Sell</li>

            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(3)">Sales</li>

            <li v-if="!isVerified" class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(4)">Verify</li>

            <!-- <li class="mx-2.5 cursor-pointer"><button @click="logout" class="bg-red-500 p-2 rounded">Log Out</button></li> -->

            <li>
                <div class="mx-2.5 cursor-pointer group relative">
                    <div class="rounded-full h-9 w-9 border-2 flex justify-center bg-red-400">
                        <div class="flex items-center text-white">
                            <h1>{{initial}}</h1>
                            <div class="absolute top-9 left-[-1.125rem] hidden group-hover:block pointer-events-auto">
                                <div class="flex flex-col my-2 z-10">
                                    <button @click="emitTabEvent(0)" class="text-black inline-block px-3 py-1.5 border-b rounded-md bg-white hover:text-white hover:bg-blue-500" @editProfile="emitTabEvent(-1)">Profile</button>
                                    <button @click="logout" class="text-black inline-block px-3 py-1.5 border-b rounded-md bg-white hover:text-white hover:bg-red-500">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            </ul>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'NavSeller',
        data() {
            return {
                query: '',
                seller: {},
                showMenu: false,
                initial: '',
                isVerified: true
            }
        },
        props: ['active'],
       methods:{
            emitTabEvent(tabID){
                this.$emit('changetab',tabID)
            },
            logout() {
                axios.post('/logout').then(() => {
                    localStorage.removeItem('seller_token')
                    window.location.href = '/'
                })
            },
            async getSeller() {
                try {
                    const response = await axios('/api/seller/info', {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('seller_token')}`
                        }
                    })
                    this.seller = response.data
                    this.isVerified = this.seller.ver_id !== null
                    this.initial = this.seller.first_name.charAt(0)
                }
                catch(err) {
                    console.log(err)
                }
            },
       },
       async mounted() {
            await this.getSeller()
       }
    }

</script>

<style scoped>
</style>



