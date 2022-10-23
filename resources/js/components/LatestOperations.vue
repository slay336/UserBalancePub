<template>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-striped">
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
                            <td>{{ operation.date }}</td>
                            <td>{{ operation.from }}</td>
                            <td>{{ operation.to }}</td>
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
        name: "LatestOperations",
        data() {            
            return {
                operations: [
                    {
                        id: 1,
                        date: "2022-10-23 10:59:33",
                        from: "User1",
                        to: "User2",
                        sum: "123123123",
                        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Haec para/doca illi, nos admirabilia dicamus. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Cum ageremus, inquit, vitae beatum et eundem supremum diem, scribebamus haec. In qua quid est boni praeter summam voluptatem, et eam sempiternam? Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Duo Reges: constructio interrete."
                    },
                    {
                        id: 2,
                        date: "2022-10-22 23:56:11",
                        from: "User2",
                        to: "User1",
                        sum: "23432423234",
                        description: "Neminem videbis ita laudatum, ut artifex callidus comparandarum voluptatum diceretur. Sit ista in Graecorum levitate perversitas, qui maledictis insectantur eos, a quibus de veritate dissentiunt. Cum autem in quo sapienter dicimus, id a primo rectissime dicitur. Et hercule-fatendum est enim, quod sentio -mirabilis est apud illos contextus rerum. Hanc ergo intuens debet institutum illud quasi signum absolvere. Ecce aliud simile dissimile."
                    }
                ]
            }
        } 
    }
</script>