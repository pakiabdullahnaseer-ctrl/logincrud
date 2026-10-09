<template>
    <div>

        <h1>Register</h1>

        <input type="text" v-model="name" placeholder="Name">

        <br><br>

        <input type="email" v-model="email" placeholder="Email">

        <br><br>

        <input type="password" v-model="password" placeholder="Password">

        <br><br>

        <button @click="register">Register</button>
        <p>
    Already have an account?
    <a href="/vue-login">Login</a>
</p>

        <p>{{ message }}</p>

    </div>
</template>

<script>

export default {

    name: 'Register',

    data() {
        return {
            name: '',
            email: '',
            password: '',
            message: ''
        }
    },

    methods: {

        register() {

            axios.post('/register', {
                name: this.name,
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