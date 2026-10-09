<script setup>
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const errors = ref({})
const router = useRouter()

async function login() {
  console.log('Login clicked')

  try {
    const response = await axios.post(
      'http://127.0.0.1:8000/api/login',
      {
        email: email.value,
        password: password.value
      }
    )

  console.log(response.data.message)
  router.push('/users')
  }catch (error) {
  if (error.response.status === 422) {
    errors.value = error.response.data.errors
  }
}}
</script>



<template>
  <div>
    <h1>Login</h1>


      <form @submit.prevent="login">

  <input v-model="email" type="email" placeholder="Email">
  <p v-if="errors.email">{{ errors.email[0] }}</p>
  <br><br>

  <input v-model="password" type="password" placeholder="Password">
  <p v-if="errors.password">{{ errors.password[0] }}</p>
  <br><br>

  <button type="submit">Login</button>
  <router-link to="/register">Create an account</router-link>

</form>
       
   
    
  </div>
</template>

