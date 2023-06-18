<template>
    <p class="text-2xl text-center font-bold mt-7">Business Verification Form</p>
    <div class="flex justify-center mt-7 mb-20">
        <div class="border-2 rounded-md md max-w-[450px]">
            <div class="m-3">
                <label>Seller's Name</label>
                <input type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full">
                <label>Email</label>
                <input type="email" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full">
                <label>Business Name</label>
                <input type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full">
                <label>Business Address</label>
                <input type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full">
                <label class="block my-2 mt-4">Business Description</label>
                <textarea class="border-2 pl-2 rounded-md py-1 focus:outline w-full h-[8rem]" v-model="description"></textarea>
                <div class="flex justify-end">
                    <div>
                        <button class="border-2 bg-sky-400 hover:bg-sky-500 hover:text-white
                        rounded-md border-inherit py-1 mt-2 px-6 text-white
                        " @click="submit">Submit</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Verify',
    }
</script>