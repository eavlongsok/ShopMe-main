<template>
    <div class="flex justify-center my-20">
        <div class="border-2 rounded-md w-[400px]">
            <div class="m-3">
                <div>
                    <label class="block my-2">Zip or Postal Code</label>
                    <input tpye="text" class="border-2 rounded-md py-1 focus:outline w-full"/>
                    <label class="block my-2">City</label>
                    <input tpye="text" class="border-2 rounded-md py-1 focus:outline w-full"/>
                    <label class="block my-2">Address</label>
                    <input tpye="text" class="border-2 rounded-md py-1 focus:outline w-full"/>
                </div>
                <div class="flex justify-between mt-4 mb-2">
                        <div class="mx-2">
                            <input type="radio" name="type" value="bank"/>
                            <label class="mx-2">Bank</label>
                        </div>
                        <div class="mx-2">
                            <input type="radio" name="type" value="card"/>
                            <label class="mx-2">Card</label>
                        </div>   
                </div>
                <input tpye="text" placeholder="Bank or Card ID" class="border-2 rounded-md py-1 focus:outline w-full"/>
                <div class="flex justify-center pt-6">
                    <div>
                        <h1 class="text-2xl">Total: $ 2343</h1>
                    </div>
                    
                </div>
                
            </div>
            <div class="w-full ">
                    <button class="bg-sky-400 hover:bg-sky-500 w-full text-white p-2 mt-3 text-xl" @click="passID(31)">Pay</button>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default{
        name: 'Payment',
        methods:{
            passID(tabID){
                this.$emit('changetab',tabID)
            },
        }
    }
</script>