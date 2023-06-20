<template>
    <div class="flex justify-center my-20">
        <div class=" w-[500px] shadow-lg border-2 rounded-md border-gray-200">
           <button class="w-1/2 h-12 inline-block border-2 border-gray-300 font-bold" :class="{'bg-blue-500 text-white': userType === 1, 'hover:bg-red-500': userType !== 1}" @click="changeUserType(1)">Buyer</button>
           <button class="w-1/2 h-12 inline-block border-2 border-l-0 border-gray-300 font-bold" :class="{'bg-blue-500 text-white': userType === 2, 'hover:bg-red-500': userType !== 2}" @click="changeUserType(2)">Seller</button>
            <div class="flex align-center justify-center">
           <h1 class="text-4xl mt-5 font-bold inline-block align-middle">Log In</h1>
           <Loader class="self-end ml-5" :size="2.5" v-if="spinning==true"/>
           </div>
           <div class="text-lg mt-5 w-5/6 mx-auto">
                <label for="email" class="block my-1 my4">Email:</label>

                <input ref="email" v-model="email" type="email" name="email" class="input-box"/>

                <div v-if="errors !== null && errors.hasOwnProperty('email')" class="text-red-600 font-bold text-sm">
                    <span>{{ errors.email[0] }}</span>
                </div>

                <div v-else-if="errors !== null && errors.hasOwnProperty('unmatched')" class="text-red-600 font-bold text-sm">
                    <span>{{ errors.unmatched }}</span>
                </div>

                <label for="password" class="block my-1 mt-4" >Password:</label>

                <input ref="password" v-model="password" name="password" type="password" class="input-box"/>

                <div v-if="errors !== null && errors.hasOwnProperty('password')" class="text-red-600 font-bold text-sm">
                            <span>{{ errors.password[0] }}</span>
                        </div>

                <!-- <span class="cursor-pointer hover:font-bold leading-loose" @click="showPassword()">Show password</span> -->

                <span class="cursor-pointer hover:font-bold leading-loose underline" @click="showPassword()">Show password</span>

                <div class="text-md">
                    <input name='remember' type="checkbox" class="mt-6 scale-150" @change="remember = !remember" value=1 />
                    <label for='remember' class="ml-3">Remember me</label>
                </div>

                <button @click="handleSubmit" class="border-2 border-gray-500 w-full rounded-md block bg-blue-500 text-white leading-loose text-xl mt-5 hover:bg-blue-600 mb-2">Log In
                </button>

                <p class="text-center text-[0.95rem] mb-7">No account? <a href="/signup"><span class="font-bold hover:underline hover:cursor-pointer">Sign up</span></a> now!</p>
           </div>
       </div>
    </div>


</template>

<script>
    import Loader from './Loader.vue'
   export default {
       name: 'Login',
       data() {
           return {
               email: '',
               password: '',
               userType: 1,
               remember: false,
               errors: null,
               spinning: false,
           }
       },
       props: ['active'],
       components: {Loader},
       methods: {
           showPassword() {
               let target = this.$refs.password

               if (target.type === 'password') target.type = 'text'
               else target.type = 'password'
           },
           changeUserType(type) {
                this.userType = type
                this.errors = null
            },
           async handleSubmit() {
                this.spinning = true
               try {
                    let formData = new FormData()
                    formData.append('userType', this.userType)
                    formData.append('email', this.email)
                    formData.append('password', this.password)
                    formData.append('remember', this.remember)
                   const req = await axios.post('/log-in', formData)

                   if (req.data?.success) {
                        if (this.userType === 1)
                            localStorage.setItem('buyer_token', req.data.token)
                        else if (this.userType === 2)
                            localStorage.setItem('seller_token', req.data.token)
                        window.location.href = '/'
                   }
               }
               catch (err) {
                    console.log(err.response.data)
                   if (err.response.status === 422) {
                       this.errors = err.response.data.errors
                   }
                   else if (err.response.status === 401) {
                       this.errors = err.response.data.errors
                   }
                   else if (err.response.status === 404) {
                        alert(err.response.data.errors.message)
                        this.email = ''
                        this.password = ''
                   }
                   else {
                       this.errors = 'Something went wrong. Please try again later.'
                   }

               }
               this.spinning = false
           },
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

   .input-box-name {
       @apply border-2 border-gray-500 focus:outline-blue-500 py-0.5 px-3 w-[95%] rounded-md leading-relaxed focus:shadow-lg focus:outline text-blue-900 font-bold;
   }
</style>