<script setup>
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const name = ref('')
const email = ref('')
const password = ref('')
const errors = ref({})

const router = useRouter()
async function register() {
  console.log('Register clicked')

  try {
    const response = await axios.post(
      'http://127.0.0.1:8000/api/register',
      {
        name: name.value,
        email: email.value,
        password: password.value
      }
    )

    console.log(response.data)
    router.push('/login')
  } catch (error) {
  if (error.response.status === 422) {
    errors.value = error.response.data.errors
  }
}}
</script>

<template>
  <div>
    <h1>Register</h1>

    <form @submit.prevent="register">

      <input v-model="name" type="text" placeholder="Name">
      <p v-if="errors.name">{{ errors.name[0] }}</p>
      <br><br>

      <input v-model="email" type="email" placeholder="Email">
      <p v-if="errors.email">{{ errors.email[0] }}</p>
      <br><br>

      <input v-model="password" type="password" placeholder="Password">
      <p v-if="errors.password">{{ errors.password[0] }}</p>
      <br><br>

      <button type="submit">Register</button>

      <br><br>

      <router-link to="/login">
        Already have an account? Login here
      </router-link>

    </form>
  </div>
</template>