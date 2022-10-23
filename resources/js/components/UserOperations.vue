<template>
    <div class="container">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-4">
                <label for="search">Поиск по описанию:</label>
                <input type="text" id="search" name="search" class="form-control" @keyup="search($event);">
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Дата 
                                <button class="btn btn-light" @click="sort();"><i class="fa-solid fa-sort"></i></button>
                            </th>
                            <th scope="col">От кого</th>
                            <th scope="col">Кому</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="operation in shownOperations" v-bind:key="operation.id">
                            <td>{{ $root.formatDate(Date.parse(operation.created_at)) }}</td>
                            <td>{{ operation.sender }}</td>
                            <td>{{ operation.recipient }}</td>
                            <td>{{ operation.sum }} rub</td>
                            <td>{{ operation.description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>     
</template>

<script>
    export default {
        name: "UserOperations",
        data() {            
            return {
                operations: [],
                shownOperations: [],
                sortedAsc: false
            }
        },
        methods: {
            sort: function() {
                this.sortedAsc = !this.sortedAsc;
                this.shownOperations = this.shownOperations.sort((a, b) => {
                    if (a.date !== b.date) {
                        return b.date > a.date === this.sortedAsc ? -1 : 1;
                    } else return 0;
                });
            },
            search: function(event) {
                alert("hello")
                let newValue = event.target.value;
                if (!newValue) {
                    this.shownOperations = [...this.operations];
                } else {
                    this.shownOperations = this.shownOperations.filter(operation => operation.description.toLowerCase().indexOf(newValue.toLowerCase()) > -1);
                }
            },
            getOperations: function() {
                this.$http.post("/api/operations")
                    .then(res => {
                        this.operations = res.data;
                        this.shownOperations = [...this.operations];
                    })
                    .catch(err => {
                        alert(err.message);
                    })
            }
        },
        created: function() {
            this.getOperations();
        },
        mounted: function() {
            this.sort();
        }
    }
</script>