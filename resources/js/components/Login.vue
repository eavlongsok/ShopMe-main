<template>
    
     <div class="flex justify-center my-20">
        <div class=" w-[400px] shadow-lg border-2 rounded-md border-gray-200">
            <h1 class="text-center text-4xl mt-5 font-bold">Sign Up</h1>
            <form class="text-lg mt-5 w-5/6 mx-auto" method="post">
                <div>
                    <label for="email" class="block my-1">Username:</label>

                <input ref="email" type="text" name="email" class="input-box"/>

                <label for="email" class="block my-1">Email:</label>

                <input ref="email" type="email" name="email" class="input-box"/>

                <label for="password" class="block my-1 mt-4" name="password">Password:</label>

                <input ref="password" type="password" class="input-box"/>

                <br/>
                <!-- <span class="cursor-pointer hover:font-bold leading-loose" @click="showPassword()">Show password</span> -->

                <label for="password" class="block my-1 mt-4" name="password">Confirm Password:</label>
                <input ref="password" type="password" class="input-box"/>

                <br/>
                <!-- <span class="cursor-pointer hover:font-bold leading-loose" @click="showPassword()">Show password</span> -->

                <div class="flex justify-between mt-4 mb-2">
                    <div class="mx-2">
                        <input type="radio" name="type" value="customer"/>
                        <label class="mx-2">Customer</label>
                    </div>
                    <div class="mx-2">
                        <input type="radio" name="type" value="seller"/>
                        <label class="mx-2">Seller</label>
                    </div>
                    
                </div>

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
        props: ['active'],
        methods: {
            showPassword() {
                console.log("hi")
                let target = this.$refs.password

                if (target.type === 'password') target.type = 'text'
                else target.type = 'password'
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