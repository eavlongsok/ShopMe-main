<template>
    <p class="text-2xl text-center font-bold mt-7">Business Verification Form</p>
    <div class="flex justify-center mt-7 mb-20">
        <div class="border-2 rounded-md md max-w-[450px]">
            <div class="m-3">
                <label>Business Name</label>
                <input name="business_name" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="businessName">

                <label>Building Number</label>
                <input name="building_number" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="buildingNumber">

                <label>Street Number</label>
                <input name="street_number" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="streetNumber">


                <label>Province</label>
                <select name="province" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="chosenProvince">
                    <option disabled selected>--Choose Province--</option>
                    <option v-for="pro in province" :value="pro.region_id">{{ pro.region_name }}</option>
                </select>

                <label>City</label>
                <input name="city" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="city">
                <!-- <input name="province" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="province"> -->

                <label>ZIP Code</label>
                <input name="zip_code" type="text" class="border-2 pl-2 rounded-md py-1 my-2 focus:outline w-full" v-model="zipCode" @keyup="limitStringLength($event, 6)">

                <label class="block my-2 mt-4">Business Description</label>
                <textarea name="business_info" class="border-2 pl-2 rounded-md py-1 focus:outline w-full h-[8rem]" v-model="businessInfo"></textarea>

                <label class="block my-2 mt-4 font-bold">Logo</label>
                <input type="file" name="logo" ref="logo" @change="addLogo()" accept="image/png, image/jpeg" />

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
                buildingNumber: '',
                streetNumber: '',
                city: '',
                province: [],
                zipCode: '',
                businessInfo: '',
                chosenProvince: null,
                logo: null,
            }
        },
        methods: {
            addLogo() {
                this.logo = this.$refs.logo.files[0]
            },
            async submit(){
                try{
                    let verifyData = new FormData()
                    verifyData.append('business_name', this.businessName)
                    verifyData.append('building_number', this.buildingNumber)
                    verifyData.append('street_number', this.streetNumber)
                    verifyData.append('city', this.city)
                    verifyData.append('province', this.chosenProvince)
                    verifyData.append('zip_code', this.zipCode)
                    verifyData.append('business_info', this.businessInfo)
                    verifyData.append('logo', this.logo)

                    const response = await axios.post('/api/verify', verifyData,
                    {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('seller_token')}`
                        }
                    })

                    console.log(response.data)
                    window.location.href = '/'
                }
                catch(err){
                    console.log(err.response.data)
                }
            },
            limitStringLength(event, limit) {
                if (event.target.value.length >= limit) {
                    event.target.value = event.target.value.substring(0, limit);
                }
            }
        },
        async mounted(){
            try{
                const response = await axios.get('/api/region', {
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem("seller_token")
                    }
                })
                this.province = response.data.province
            }
            catch(err){
                console.log(err.response.data)
            }
        }
    }
</script>