<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const users = ref([])
const router = useRouter()
async function getUsers() {
  try {
    const response = await axios.get(
      'http://127.0.0.1:8000/api/users'
    )

    users.value = response.data
  } catch (error) {
    console.log(error)
  }
}

function editUser(id) {
  router.push('/edit/' + id)
}
async function deleteUser(id) {
  const answer = confirm('Are you sure you want to delete this user?')

  if (!answer) {
    return
  }

  try {
    await axios.delete(
      'http://127.0.0.1:8000/api/users/' + id
    )

    getUsers()
  } catch (error) {
    console.log(error)
  }
}
onMounted(() => {
  getUsers()
})
</script>

<template>
  <div>
    <h1>Users</h1>

    <table border="1">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>

        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
           <button @click="editUser(user.id)">Edit</button>
            <button @click="deleteUser(user.id)">Delete</button>
         </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>