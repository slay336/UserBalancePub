<template>
    <div class="card position-fixed top-10 end-0 me-5">
        <div class="card-header">Баланс</div>
        <div class="card-body">{{ balance }} rub</div>
    </div>
</template>

<script>
    export default {
        name: "Balance",
        data() {
            return {
                balance: 0.0,
                refreshInterval: null
            }
        },
        methods: {
            getBalance: function() {
                this.$http.post("/api/balance")
                    .then(res => {
                        this.balance = res.data.balance;
                    })
                    .catch(err => {
                        alert(err.message);
                    })
            }
        },
        mounted: function() {
            this.getBalance();
            this.refreshInterval = setInterval(this.getBalance, this.$root.refreshIntervalMiliseconds);            
        },
        beforeDestroy: function() {
            clearInterval(this.refreshInterval);
            this.refreshInterval = null;
        }
    }
</script>