<template>
    <div>

        <h1>Login Page</h1>

        <input type="email" v-model="email" placeholder="Email">

        <br><br>

        <input type="password" v-model="password" placeholder="Password">

        <br><br>

        <button @click="login">Login</button>
    <p>
    Dont have an account?
    <a href="/vregister">Register</a>
</p>
        <p>{{ message }}</p>

    </div>
</template>


<script>

export default {

    name: 'Login',

    data() {
        return {
            email: '',
            password: '',
            message: ''
        }
    },

    methods: {

        login() {

            axios.post('/vue-login', {
                email: this.email,
                password: this.password
            })

            .then(response => {
                 window.location.href = response.data.redirect;
            })

            .catch(error => {
                this.message = error.response.data.message;
            });

        }

    }

}

</script>