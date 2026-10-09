<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()

const name = ref('')
const email = ref('')
const router = useRouter()
async function getUser() {
  try {
    const response = await axios.get(
      'http://127.0.0.1:8000/api/users/' + route.params.id
    )

    name.value = response.data.name
    email.value = response.data.email

  } catch (error) {
    console.log(error)
  }
} async function updateUser() {
  try {
    await axios.put(
      'http://127.0.0.1:8000/api/users/' + route.params.id,
      {
        name: name.value,
        email: email.value
      }
    )

    console.log('User updated')
    router.push('/users')
  } catch (error) {
    console.log(error)
  }
}


onMounted(() => {
  getUser()
})
</script>

<template>
  <div>
    <h1>Edit User</h1>

    <input v-model="name" type="text">
    <br><br>

    <input v-model="email" type="email">
    <br><br>

    <button @click="updateUser">Update</button>
  </div>
</template>