<template>
    <div class="md:flex bg-sky-400 justify-evenly py-2.5 md:items-center">

        <div class="flex mx-3">
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
            <button type="button" class="inline-block absolute right-[-8px] outline-none top-0 h-10 w-10 bg-sky-400 rounded-lg" @click="search"><img src="searchicon.svg" width="25" class="mx-auto"/></button>

        </div>


        <div class="mx-3 ">

            <ul :class="showMenu ? 'flex': 'hidden'" class="flex-col mt-1 space-y-4 md:flex md:flex-row md:items-center md:space-y-0 ">
            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(1)">Home</li>
            <li class="mx-2.5 group">

                <button class="hover:text-white" >
                    Category
                </button>
                <div class="absolute top-0 right-52 transition group-hover:translate-y-12 translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-500 ease-in-out group-hover:transform z-50 transform ">
                    <div class="relative top-4 right-2 p-6 bg-white rounded-xl shadow-xl w-full grid grid-cols-2 ">
                        <div class="mx-4 my-2">
                            <ul>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 23)">Art</li>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 21)">Baby Essentials</li>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 17)">Books And Movies</li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 12)">Clothing</li>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 22)">Electronics</li>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 18)">Furniture</li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 19)">Health And Beauty</li>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 15)">Industrial And Scientific</li>
                                <li class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 20)">Pet Supplies</li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 13)">Sports And Outdoors</a></li>
                                <li><a href="#" class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 16)">Tools And Home Appliances</a></li>
                                <li><a href="#" class="hover:text-emerald-400 cursor-pointer" @click="emitTabEvent(2); $emit('category', 14)">Toys And Games</a></li>

                            </ul>
                        </div>

                    </div>
                </div>


            </li>

            <!-- <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(3)">Sell</li> -->

            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(4)">History</li>
            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(5)">Watchlist</li>
            <li class="mx-2.5 cursor-pointer hover:text-white" @click="emitTabEvent(7)">SearchResult</li>
            <!-- list use for link to cart -->
            <li class="mx-3 cursor-pointer" @click="emitTabEvent(6)">

                <!-- cart image -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                <!-- cart image -->

            </li>

            <li>
                <div class="mx-2.5 cursor-pointer group relative">
                    <div class="rounded-full h-9 w-9 border-2 flex justify-center bg-red-400">
                        <div class="flex items-center text-white">
                            <h1>{{initial}}</h1>
                            <div class="absolute top-9 left-[-1.125rem] hidden group-hover:block pointer-events-auto">
                                <div class="flex flex-col my-2 z-10">
                                    <button @click="emitTabEvent(8)" class="text-black inline-block px-3 py-1.5 border-b rounded-md bg-white hover:text-white hover:bg-blue-500" @editProfile="emitTabEvent(9)">Profile</button>
                                    <button @click="logout" class="text-black inline-block px-3 py-1.5 border-b rounded-md bg-white hover:text-white hover:bg-red-500">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- list use for link to cart -->

            <!-- login icon -->
            <!-- <li class="mx-3 cursor-pointer" @click="emitTabEvent(7)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>

            </li> -->
            </ul>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'NavBuyer',
        data() {
            return {
                query: '',
                seller: {},
                showMenu: false,
                initial: ''
            }
        },
        props: ['active'],
        emits: ['changetab', 'category'],
        methods:{
            emitTabEvent(tabID){
                this.$emit('changetab',tabID)
            },
            logout() {
                axios.post('/logout').then(() => {
                    localStorage.removeItem('buyer_token')
                    window.location.href = '/'
                })
            },
            async search() {

            },
            async getBuyer() {
                try {
                    const response = await axios('/api/buyer/info', {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('buyer_token')}`
                        }
                    })
                    this.buyer = response.data
                    console.log(response.data)
                    this.initial = this.buyer.first_name.charAt(0)
                }
                catch(err) {
                    console.log(err)
                }
            }
        },
       async mounted() {
            await this.getBuyer()
       }
    }

</script>



