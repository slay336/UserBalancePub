<template>
    <div class="container text-center mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <div class="card p-100">
                    <h5 class="card-header">
                        Войти в систему
                    </h5>
                    <div class="card-body needs-validation">
                        <div class="form-outline">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" id="email" v-model="form.email" :class="{ 'is-invalid': invalidCredentials }">
                            <div class="invalid-feedback">Некорректные данные для входа</div>
                        </div>
                        <div class="form-outline">
                            <label for="password" class="form-label">Пароль</label>
                            <input class="form-control form-control-lg" type="password" name="password" id="password" v-model="form.password" :class="{ 'is-invalid': invalidCredentials }">                            
                        </div>
                        <button class="btn btn-primary mt-3 text-uppercase" @click="login();" :disabled="awaiting">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Login",
        data() {
            return {
                invalidCredentials: false,
                awaiting: false,
                form: {
                    email: null,
                    password: null,
                }
            }
        },
        methods: {
            login: function() {
                if(this.awaiting) return;
                this.awaiting = true;
                this.$http.post("/api/login", this.form)
                    .then(() => {
                        this.awaiting = false;
                        this.$router.push({ name: "index" })
                    })
                    .catch(err => {
                        if(err.response && err.response.status == 422) {
                            this.invalidCredentials = true;
                        } else {
                            alert(err);
                        }
                        this.awaiting = false;
                    })
            }
        },
        created: function() {
            this.$root.checkLoggedIn();
        }
    };
</script>