<template>
    <div class="cursor-pointer fixed z-10 mt-4 mb-7" @click="$emit('changetab', 0)">
        <img src="back-arrow.png" width="16" class="inline-block">
        <span class="text-lg align-middle ml-2 underline hover:font-bold">Back</span>
    </div>
    <div class="h-[100vh] w-full mt-10">
        <h1 class="text-3xl font-bold text-center">Edit Account Information</h1>
        <div class="mt-10 w-3/5 p-5 pb-8 mx-auto border-[1px] border-gray-700 shadow-2xl rounded-md px-5 flex flex-col items-center justify-center gap-y-5">
            <div class="text-xl w-full">
                <label>Email: </label>
                <span class="text-red-600 text-lg" v-if="errors != null && errors.hasOwnProperty('email')">{{errors.email[0]}}</span>
                <br/>
                <input type="email" v-model="email" class="mt-2 w-full h-10 border-[1px] border-black rounded-md px-4" :placeholder="email" />
            </div>
            <div class="text-xl w-full">
                <label>Password: </label>
                <span class="text-red-600 text-lg" v-if="errors != null && errors.hasOwnProperty('password')">{{errors.password[0]}}</span>
                <br/>
                <input type="password" v-model="password" ref="password" class="mt-2 w-full h-10 border-[1px] border-black rounded-md px-4" placeholder="New Password"/>
            </div>
            <div class="text-xl w-full">
                <label>Confirm Password: </label>
                <span class="text-red-600 text-lg" v-if="errors != null && errors.hasOwnProperty('confirmPassword')">{{errors.confirmPassword[0]}}</span>
                <br/>
                <input type="password" v-model="confirmPassword" ref="confirmPassword" class="mt-2 w-full h-10 border-[1px] border-black rounded-md px-4" placeholder="Confirm Password"/>
            </div>

            <span class="self-start hover:underline cursor-pointer text-lg select-none" @click="togglePassword" ref="toggle">Show Password</span>

            <button class="self-start p-2 px-4 hover:bg-blue-100 text-lg border-[1px] border-black rounded-md" @click="editAccount" v-if="email != oldEmail || password != '' || confirmPassword != ''">Update</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                oldEmail: '',
                password: '',
                confirmPassword: '',
                errors: null
            }
        },
        emits: ['changetab'],
        methods: {
            togglePassword() {
                if(this.$refs.password.type == 'password') {
                    this.$refs.password.type = 'text';
                    this.$refs.confirmPassword.type = 'text';
                    this.$refs.toggle.innerHTML = 'Hide Password';
                }
                else {
                    this.$refs.password.type = 'password';
                    this.$refs.confirmPassword.type = 'password';
                    this.$refs.toggle.innerHTML = 'Show Password';
                }
            },

            async editAccount() {
                this.errors = null;
                // console.log(this.email, this.password, this.confirmPassword)
                let formData = new FormData();
                formData.append('email', this.email);
                formData.append('password', this.password);
                formData.append('confirmPassword', this.confirmPassword);
                try {
                    const response = await axios.post('/api/seller/editAccount', formData, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                        }
                    });

                    if (response.data?.success) {
                        alert('Successfully Updated!')
                        this.$emit('changetab', 8)
                    }
                }
                catch(err) {
                    console.log(err.response)
                    if (err.response.status) {
                        this.errors = err.response.data.errors;
                    }
                }
            }
        },
        async mounted() {
            try {
                const response = await axios.get('/api/seller/info', {headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('seller_token'),
                }})

                this.email = response.data.email;
                this.oldEmail = response.data.email;
            } catch(err) {
                console.log(err.response)
            }
        }
    }
</script>

<style scoped>

</style>