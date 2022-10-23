<template>
    <div class="container">
        <p class="text-center mt-2" style="font-size: 20px;" v-if="!$root.isLoggedIn">Для просмотра страницы, необходимо войти в систему</p>
        <div v-else>
            <p class="text-center" style="font-size: 20px;">Данные пользователя {{ this.$root.currentUser.email }}</p>
            <v-balance></v-balance>
            <p class="text-center" style="font-size: 18px;">Последние операции с участием пользователя:</p>
            <v-latest-operations></v-latest-operations>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        created: function(){
            this.$root.checkLoggedIn();
        }
    }

</script>