<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <router-link 
                class="navbar-brand navbar-logo display-5"
                to="/"
            >User Balance</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" v-if="$root.isLoggedIn">
                        <router-link class="nav-link active" style="font-size: 18px" aria-current="page" to="/operations">
                            История операций
                        </router-link>
                    </li>
                </ul>
            </div>
            <ul class="nav nav-pills justify-content-end">
                <li class="nav-item" v-if="!$root.isLoggedIn">
                    <router-link class="nav-link link-light" to="/login">
                        <i class="fa-solid fa-right-to-bracket"></i> Войти
                    </router-link>
                </li>
                <li class="nav-item" v-if="$root.isLoggedIn">
                    <button class="nav-link link-light" @click="logout();">
                        <i class="fa-solid fa-right-from-bracket"></i> Выйти
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>

    export default {
        name: "Header",
        methods: {
            logout: function() {
                axios.post("/api/logout")
                    .then(() => {
                        this.$router.push({ name: "index" });
                        this.$root.isLoggedIn = false;
                    })
                    .catch(err => {
                        alert(err);
                    })
            }
        }
    }
</script>