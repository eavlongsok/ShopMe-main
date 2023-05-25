<template>
    <div class="w-full flex justify-center min-h-[500px]">
        <div class="min-w-[700px] my-20">
            <div class="border-2 flex justify-between p-3">
                <div class="flex items-center">
                    <div class="flex">
                    <h1 class="mx-1">Transaction ID: 0024234</h1>
                    <h1 class="mx-8">Date: 2022-6-13</h1>
                    <h1 class="mx-2">Total: $2343</h1>
                    </div>
                </div>
                

                <div class="flex items-center">
                    <button class="border-2 bg-sky-400 hover:bg-sky-500 rounded-lg border-inherit py-1 px-4 text-white" @click="passID(31)">Detail</button>
                </div>
            </div>

            <div class="border-2 flex justify-between p-3">
                <div class="flex items-center">
                    <div class="flex">
                    <h1 class="mx-1">Transaction ID: 0021234</h1>
                    <h1 class="mx-8">Date: 2021-7-13</h1>
                    <h1 class="mx-2">Total: $4543</h1>
                    </div>
                </div>
                

                <div class="flex items-center">
                    <button class="border-2 bg-sky-400 hover:bg-sky-500 rounded-lg border-inherit py-1 px-4 text-white" @click="passID(31)">Detail</button>
                </div>
            </div>

            <div class="border-2 flex justify-between p-3">
                <div class="flex items-center">
                    <div class="flex">
                    <h1 class="mx-1">Transaction ID: 0011254</h1>
                    <h1 class="mx-8">Date: 2020-7-24</h1>
                    <h1 class="mx-2">Total: $543</h1>
                    </div>
                </div>
                

                <div class="flex items-center">
                    <button class="border-2 bg-sky-400 hover:bg-sky-500 rounded-lg border-inherit py-1 px-4 text-white" @click="passID(31)">Detail</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'History',
        methods: {
        passID(tabID){
                this.$emit('changetab',tabID)
            },
       }
    }
</script>