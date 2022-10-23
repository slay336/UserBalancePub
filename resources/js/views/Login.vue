<template>
    <div class="container text-center mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <div class="card p-100">
                    <h5 class="card-header">
                        Войти в систему
                    </h5>
                    <div class="card-body">
                        <div class="form-outline">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" id="email">                            
                        </div>
                        <div class="form-outline">
                            <label for="password" class="form-label">Пароль</label>
                            <input class="form-control form-control-lg" type="password" name="password" id="password">                            
                        </div>
                        <button class="btn btn-primary mt-3 text-uppercase">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login"
    }
</script>