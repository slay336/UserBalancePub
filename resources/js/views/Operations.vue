<template>
    <div>
        <p class="text-center mt-2" style="font-size: 20px;" v-if="!$root.isLoggedIn">Для просмотра страницы, необходимо войти в систему</p>
        <div v-else>
            <p class="text-center" style="font-size: 20px;">История операций пользователя {{ this.$root.currentUser.name }}</p>
            <v-user-operations></v-user-operations>
        </div>
    </div>
</template>

<script>

export default {
    name: "Operations",
    created: function() {
        this.$root.checkLoggedIn();
    }
};
</script>
