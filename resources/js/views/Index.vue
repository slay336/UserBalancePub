<template>
    <div class="container">
        <p class="text-center" style="font-size: 20px;">Данные пользователя TEST_USER</p>
        <v-balance></v-balance>
        <p>Последние операции с участием пользователя:</p>
        <v-latest-operations></v-latest-operations>
    </div>
</template>

<script>
    export default {
        name: "Index"
    }
</script>