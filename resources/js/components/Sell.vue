<template>
    <div class="flex justify-center my-20">
        <div class="border-2 rounded-md min-w-[400px]">
            <div class="m-3">
                <div>
                    <label class="block my-2">Product Name</label>
                    <input type="text" class="border-2 rounded-md py-1 focus:outline w-full"/>
                    <label class="block my-2">Price</label>
                    <input type="text" class="border-2 rounded-md py-1 focus:outline w-full"/>
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
                            Attach an Images</p>
                    </div>
                    <input type="file" class="opacity-0" />
                    </label>
                </div>

                <div class="flex justify-between">
                    <div>
                    <button class="relative flex justify-center items-center border rounded group">
                        <p class="px-3">Category</p>
                        <span class="p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <div class="absolute hidden group-focus:block mt-1 bg-white min-w-full top-full ">
                            <ul class="text-left border rounded overflow-auto max-h-36">
                                <li class="px-3 py-1 border-b">Shirt</li>
                                <li class="px-3 py-1 border-b">Pant</li>
                                <li class="px-3 py-1 border-b">Shoes</li>
                                <li class="px-3 py-1 border-b">PC</li>
                                <li class="px-3 py-1 border-b">Camera</li>
                                <li class="px-3 py-1 border-b">Devices</li>
                                <li class="px-3 py-1 border-b">Table</li>
                                <li class="px-3 py-1 border-b">Chair</li>
                                <li class="px-3 py-1 border-b">Bed</li>
                                <li class="px-3 py-1 border-b">Toy</li>
                                <li class="px-3 py-1 border-b">Beauty</li>
                            </ul>
                        </div>
                    </button>
                    </div>

                    <div>
                        <button class="border-2 bg-sky-400 hover:bg-sky-500 hover:text-white
                        rounded-md border-inherit py-1 px-6 text-white 
                        ">Submit</button>
                    </div>
                </div>
                

               
                
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Sell',
    }
</script>