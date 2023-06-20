<template>
    <p class="text-2xl text-center font-bold mt-7">Business Verification Form</p>
    <div class="flex justify-center mt-7 mb-20">
        <div class="border-2 rounded-md md max-w-[450px]">
            <div class="m-3">
                <label>Business Name</label>
                <input name="business_name" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="businessName">
                <label>Business Address</label>
                <input name="business_add" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="businessAdd">
                <label class="block my-2 mt-4">Business Description</label>
                <textarea name="business_info" class="border-2 pl-2 rounded-md py-1 focus:outline w-full h-[8rem]" v-model="businessInfo"></textarea>
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
        data(){
            return {
                businessName: '',
                businessAdd: '',
                businessInfo: '',
            }  
        },
        methods: {
            async submit(){
                try{
                    let verifyData = new FormData()
                    verifyData.append('business_name', this.businessName)
                    verifyData.append('business_add', this.businessAdd)
                    verifyData.append('business_info', this.businessInfo)

                    const response = await axios.post('/api/verify', verifyData, 
                    {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('seller_token')}`
                        }
                    })
                    console.log(response.data)
                }
                catch(err){
                    console.log(err.response.data)
                }
            }   
        }
    }
</script>