<template>
    <div class="md:flex bg-sky-400 justify-between py-2.5 md:items-center">
        <div class="flex mx-3">
            <img src="Logo/logo-no-background.svg" alt="logo"/>
        </div>

        <span @click="showMenu = !showMenu" class="absolute md:hidden right-6 top-5 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
       </span>

        <div class="w-6/12 mx-2.5    "> 
            <input tpye="search" placeholder="Search Product" aria-label="Search Product"  :class="showMenu ? 'flex': 'hidden'" 
            class="w-full mx-2.5 mt-4 mb-4 space-y-4 md:mt-0 md:mb-0 md:space-y-0 md:flex flex-col  md:flex-row rounded-md px-3 py-2 
            placeholder-gray-500 border-none ring-2 ring-gray-300 focus:ring-gray-500 focus:ring-2 text-black"/>
            
        </div>
        
       
        <div  class="mx-3 ">
            
            <ul :class="showMenu ? 'flex': 'hidden'" class="flex-col mt-1 space-y-4 md:flex md:flex-row md:items-center md:space-y-0 ">
            <li class="mx-2.5 "><a href="#">Home</a></li>
            <li class="mx-2.5 group">
               

                <button >
                    Category
                </button>
                <div class="absolute top-0 right-12 transition group-hover:translate-y-12  translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-500 ease-in-out group-hover:transform z-50  transform ">
                    <div class="relative top-4 right-3 p-6 bg-white rounded-xl shadow-xl w-full grid grid-cols-3 ">
                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="text-purple-600 underline hover:text-emerald-400">Fashion</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Shirt</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Pant</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Shoes</a></li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="text-purple-600 underline hover:text-emerald-400">Music</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Guitar</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Piano</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Drum</a></li>
                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="text-purple-600 underline hover:text-emerald-400">Electronic</a></li>
                                <li><a href="#" class="hover:text-emerald-400">PC</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Camera</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Headphone</a></li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="text-purple-600 underline hover:text-emerald-400">Furniture</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Table</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Chair</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Bed</a></li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="text-purple-600 underline hover:text-emerald-400">Tool</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Sport</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Home</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Science</a></li>

                            </ul>
                        </div>

                        <div class="mx-4 my-2">
                            <ul>
                                <li><a href="#" class="text-purple-600 underline hover:text-emerald-400">Other</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Promotion</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Toy</a></li>
                                <li><a href="#" class="hover:text-emerald-400">Beauty</a></li>

                            </ul>
                        </div>
                        
                    </div>
                </div>

               
            </li>
            <li class="mx-2.5"><a href="#">Sell</a></li>
            <li class="mx-2.5"><a href="#">Watchlist</a></li>
            <!-- list use for link to cart -->
            <li class="mx-3" ><a href="#" @click="emitTabEvent(5)" :class="{'':active === 5}">
               
                <!-- cart image -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                <!-- cart image -->
                </a>
            </li>
            <!-- list use for link to cart -->

            <li class="mx-3"><a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>

            </a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Navbar',
        props: ['active'],
       data(){
        return {
            active: 1,
            showMenu: false,
        }
       },
       methods:{
            emitTabEvent(tabID){
                this.$emit('changetab',tabID)
            }
       },
       

    }


    
</script>



