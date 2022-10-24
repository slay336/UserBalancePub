<template>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-striped" v-if="operations.length > 0">
                    <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">От кого</th>
                            <th scope="col">Кому</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="operation in operations" v-bind:key="operation.id">
                            <td>{{ $root.formatDate(Date.parse(operation.created_at)) }}</td>
                            <td>{{ operation.sender }}</td>
                            <td>{{ operation.recipient }}</td>
                            <td>{{ operation.sum }} $</td>
                            <td>{{ operation.description }}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center" style="font-size: 16px;" v-else>Нет операций для просмотра</p>
            </div>
        </div>
    </div>    
</template>

<script>
    export default {
        name: "LatestOperations",
        data() {            
            return {
                operations: [],
                refreshInterval: null
            }
        },
        methods: {
            getLatestOps: function() {
                this.$http.post("/api/operations", {
                    "last": 5
                })
                    .then(res => {
                        this.operations = res.data;
                    })
                    .catch(err => {
                        alert(err.message);
                    })
            }
        },
        mounted: function() {
            this.getLatestOps();
            this.refreshInterval = setInterval(this.getLatestOps, this.$root.refreshIntervalMiliseconds);
        },
        beforeDestroy: function() {
            clearInterval(this.refreshInterval);
            this.refreshInterval = null;
        }
    }
</script>