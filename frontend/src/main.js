import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'

import App from './App.vue'
import Login from './login.vue'
import Register from './register.vue'
import Users from './users.vue'
import Edit from './edit.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/users', component: Users },
    { path: '/edit/:id', component: Edit }
  ]
})

createApp(App)
  .use(router)
  .mount('#app')