<template>
    <div class="flex justify-center my-20">
        <div class="border-2 rounded-md min-w-[400px]">
            <div class="border-2 bg-sky-400 flex justify-center">
                    <img src="Logo/logo-no-background.svg" alt="logo"/>
            </div>

            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>Transaction ID:</h1>
                </div>
                <div class="mx-2">
                    <h1>002454</h1>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>Method:</h1>
                </div>
                <div class="mx-2">
                    <h1>bank or card</h1>
                </div>
            </div>

            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>From:</h1>
                </div>
                <div class="mx-2">
                    <h1>John (00342)</h1>
                </div>
            </div>

            <!-- <div class="flex justify-between">
                <div class="mx-2">
                    <h1>To:</h1>
                </div>
                <div class="mx-2">
                    <h1>James (00342)</h1>
                </div>
            </div> -->
            
            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>Date:</h1>
                </div>
                <div class="mx-2">
                    <h1>2023-5-15</h1>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>Zip or Postal Code:</h1>
                </div>
                <div class="mx-2">
                    <h1>3432</h1>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>City:</h1>
                </div>
                <div class="mx-2">
                    <h1>new york</h1>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="mx-2">
                    <h1>Address:</h1>
                </div>
                <div class="mx-2">
                    <h1>st,34</h1>
                </div>
            </div>

            <div class="flex justify-between border-2 my-2 p-1">
                <table class="border-separate border-spacing-x-1">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>car</td>
                        </tr>
                    </tbody>
                </table>
                <table class="border-separate border-spacing-x-7">
                    <thead>
                        <tr>
                            
                            <td>Quantity</td>
                            <td>Price</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>200</td>
                        </tr>
                    </tbody>
                </table>
                <table class="border-separate border-spacing-x-1">
                    <thead>
                        <tr>
                           
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>400</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center pt-1">
                    <div>
                        <h1 class="text-lg">Total: $ 2343</h1>
                    </div>
                    
                </div>

            <div class="w-full">
                <button class="bg-sky-400 hover:bg-sky-500 w-full text-white p-2 mt-1 text-xl" @click="passID(1)">Done</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Transaction',
       methods: {
        passID(tabID){
                this.$emit('changetab',tabID)
            },
       }
    }
</script>