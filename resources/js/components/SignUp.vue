<template>
     <div class="flex justify-center my-20">
         <div class=" w-[500px] shadow-lg border-2 rounded-md border-gray-200">
            <button class="w-1/2 h-12 inline-block border-2 border-gray-300 font-bold" :class="{'bg-blue-500 text-white': userType === 1, 'hover:bg-red-500': userType !== 1}" @click="changeUserType(1)">Buyer</button>
            <button class="w-1/2 h-12 inline-block border-2 border-l-0 border-gray-300 font-bold" :class="{'bg-blue-500 text-white': userType === 2, 'hover:bg-red-500': userType !== 2}" @click="changeUserType(2)">Seller</button>
            <h1 class="text-center text-4xl mt-5 font-bold">Sign Up</h1>
            <div class="text-lg mt-5 w-5/6 mx-auto">
                <div>
                    <div class="grid grid-cols-2">
                        <div>
                            <label for="firstName" class="block my-1" >First Name:</label>
                            <input ref="firstName" v-model="firstName" name="firstName" type="text" class="input-box-name"/>
                            <div v-if="errors !== null && errors.hasOwnProperty('firstName')" class="text-red-600 font-bold text-sm">
                                <span>{{ errors.firstName[0] }}</span>
                            </div>
                        </div>

                        <div>
                            <label for="lastName" class="block my-1" >Last Name:</label>
                            <input v-model="lastName" name="lastName" type="text" class="input-box-name"/>
                            <div v-if="errors !== null && errors.hasOwnProperty('lastName')" class="text-red-600 font-bold text-sm">
                                <span>{{ errors.lastName[0] }}</span>
                            </div>
                        </div>
                    </div>

                    <label for="email" class="block my-1 my4">Email:</label>

                    <input v-model="email" type="email" name="email" class="input-box"/>

                    <div v-if="errors !== null && errors.hasOwnProperty('email')" class="text-red-600 font-bold text-sm">
                                <span>{{ errors.email[0] }}</span>
                            </div>

                    <label for="password" class="block my-1 mt-4" >Password:</label>

                    <input ref="password" v-model="password" name="password" type="password" class="input-box"/>

                    <div v-if="errors !== null && errors.hasOwnProperty('password')" class="text-red-600 font-bold text-sm">
                                <span>{{ errors.password[0] }}</span>
                            </div>

                    <!-- <span class="cursor-pointer hover:font-bold leading-loose" @click="showPassword()">Show password</span> -->

                    <label for="confirmPassword" class="block my-1 mt-4">Confirm Password:</label>
                    <input ref="confirmPassword" type="password" name="confirmPassword" v-model="confirmPassword" class="input-box"/>

                    <div v-if="errors !== null && errors.hasOwnProperty('confirmPassword')" class="text-red-600 font-bold text-sm">
                        <span>{{ errors.confirmPassword[0] }}</span>

                    </div>

                    <span class="cursor-pointer hover:font-bold leading-loose underline" @click="showPassword()">Show password</span>

                    <div class="text-md">
                        <input name='remember' type="checkbox" class="mt-4 scale-150" @change="remember = !remember" value=1 />
                        <label for='remember' class="ml-3">Remember me</label>
                    </div>

                    <button @click="handleSubmit" class="border-2 border-gray-500 w-full rounded-md block bg-blue-500 text-white leading-loose text-xl mt-5 hover:bg-blue-600">Sign Up</button>

                </div>

                <div class="flex justify-center">
                    <p class="mt-4">or</p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="border-2 border-gray-500 w-full rounded-md block bg-red-600 text-white leading-loose text-xl mt-5 hover:bg-red-700 ">Continue with Google</button>
                </div>

                <p class="text-center text-[0.95rem] mb-7">Already have an account? <a href="/login"><span class="font-bold hover:underline hover:cursor-pointer">Log in</span></a> here!</p>

            </div>
        </div>
     </div>


</template>

<script>
    export default {
        name: 'SignUp',
        data() {
            return {
                firstName: '',
                lastName: '',
                email: '',
                password: '',
                confirmPassword: '',
                userType: 1,
                remember: false,
                errors: null
            }
        },
        props: ['active'],
        methods: {
            showPassword() {
                let target1 = this.$refs.password
                let target2 = this.$refs.confirmPassword

                if (target1.type === 'password') target1.type = 'text'
                else target1.type = 'password'

                if (target2.type === 'password') target2.type = 'text'
                else target2.type = 'password'
            },
            changeUserType(type) {
                this.userType = type
                this.errors = null
            },
            async handleSubmit() {
                try {
                    const req = await axios.post('/sign-up', {userType: this.userType, firstName: this.firstName, lastName: this.lastName, email: this.email, password: this.password, confirmPassword: this.confirmPassword, remember: this.remember})

                    // if (req.data?.success) {
                    //     window.location.href = '/'
                    // }
                }
                catch (err) {
                    console.log(err.response.data)
                    if (err.response.status === 422) {
                        this.errors = err.response.data.errors
                    }
                    else {
                        this.errors = 'Something went wrong. Please try again later.'
                    }

                }
            },
        },
        mounted() {
            this.$refs.firstName.focus()
        }
    }
</script>

<style scoped>
    .input-box {
        @apply border-2 border-gray-500 focus:outline-blue-500 py-0.5 px-3 w-full rounded-md leading-relaxed focus:shadow-lg focus:outline text-blue-900 font-bold;
    }

    .input-box-name {
        @apply border-2 border-gray-500 focus:outline-blue-500 py-0.5 px-3 w-[95%] rounded-md leading-relaxed focus:shadow-lg focus:outline text-blue-900 font-bold;
    }
</style>