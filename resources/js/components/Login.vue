<template>
     <div class="flex justify-center my-20">
         <div class=" w-[400px] shadow-lg border-2 rounded-md border-gray-200">
            <button class="w-1/2 h-12 inline-block border-2 border-gray-300 font-bold" :class="{'bg-blue-500 text-white': userType === 1, 'hover:bg-red-500': userType !== 1}" @click="userType = 1">Buyer</button>
            <button class="w-1/2 h-12 inline-block border-2 border-l-0 border-gray-300 font-bold" :class="{'bg-blue-500 text-white': userType === 2, 'hover:bg-red-500': userType !== 2}" @click="userType = 2">Seller</button>
            <h1 class="text-center text-4xl mt-5 font-bold">Sign Up</h1>
            <form class="text-lg mt-5 w-5/6 mx-auto" method="post">
                <div>

                <label for="email" class="block my-1">Email:</label>

                <input ref="email" v-model="email" type="email" name="email" class="input-box"/>

                <label for="password" class="block my-1 mt-4" name="password">Password:</label>

                <input ref="password" v-model="password" type="password" class="input-box"/>

                <br/>
                <!-- <span class="cursor-pointer hover:font-bold leading-loose" @click="showPassword()">Show password</span> -->

                <label for="password" class="block my-1 mt-4" name="password">Confirm Password:</label>
                <input ref="confirmPassword" type="password" v-model="confirmPassword" class="input-box"/>

                <br/>
                <span class="cursor-pointer hover:font-bold leading-loose underline" @click="showPassword()">Show password</span>

                <button type="submit" class="border-2 border-gray-500 w-full rounded-md block bg-blue-500 text-white leading-loose text-xl mt-5 hover:bg-blue-600">Sign Up</button>

                </div>

                <div class="flex justify-center">
                    <p class="mt-4">or</p>
                </div>
                <div class="mb-5">
                    <button type="submit" class="border-2 border-gray-500 w-full rounded-md block bg-red-600 text-white leading-loose text-xl mt-5 hover:bg-red-700 ">Continue with Google</button>
                </div>

            </form>
        </div>
     </div>


</template>

<script>
    export default {
        name: 'Login',
        data() {
            return {
                email: '',
                password: '',
                confirmPassword: '',
                userType: 1
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
            }
        },
        mounted() {
            this.$refs.email.focus()
        }
    }
</script>

<style scoped>
    .input-box {
        @apply border-2 border-gray-500 focus:outline-blue-500 py-0.5 px-3 w-full rounded-md leading-relaxed focus:shadow-lg focus:outline text-blue-900 font-bold;
    }
</style>