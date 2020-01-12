<template>
    <div class="row">
        <div class="col-md-4 text-left">
            <h3><slot name="service"></slot> <small class="text-muted">#<slot name="jobid"></slot></small></h3>
            <p>Job for <a :href="this.href"><slot name="contactname"></slot></a>
            </p>
            <p><slot name="address"></slot></p>

            <a class="fa-link" data-toggle="collapse" href="#scope" role="button"
               aria-expanded="false" aria-controls="multiCollapseExample1">
                Scope of Work
            </a>
            <div class="collapse multi-collapse" id="scope">
                <p> <slot name="scopeofwork"></slot></p>
            </div>
            <div><span class="badge badge-primary">{{this.currentStatusName}}</span></div>
        </div>

        <div class="col-md-4 offset-md-4 text-right">
            <div class="btn-group" role="group" aria-label="Basic example">
                <template v-for="(value, name, index) in statusData">
                    <template v-if="name === 'Complete'">
                        <button type="button" class="btn btn-secondary" disabled>{{ name }}</button>
                    </template>
                    <template v-else>
                        <button type="button" class="btn btn-secondary" @click="updateStatus(value)">{{ name }}</button>
                    </template>
                </template>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "StatusJobComponent",
        props: ['currentstatus', 'token', 'job', 'href', 'statusname'],
        data: function () {
            return {
                statusData: [],
                currentNumber: Number(this.currentstatus),
                currentStatusName: this.statusname,

            }
        },
        mounted() {
            this.getDisplayStatus();
        },
        methods: {
            getDisplayStatus() {
                switch (this.currentNumber) {
                    case 1:
                    case 2:
                        this.statusData = {'Start Job': 3, 'On Hold': 4, 'Make Complete': 5};
                        break;
                    case 3:
                        this.statusData = {'Stop Job': 1, 'On Hold': 4, 'Make Complete': 5};
                        break;
                    case 4:
                        this.statusData = {'Start Job': 3, 'Remove On Hold': 3, 'Make Complete': 5};
                        break;
                    case 5:
                        return this.statusData = {'Restart Job': 3, 'Complete': 0};
                        break;
                    default:
                        this.statusData = {'Start Job': 3, 'On Hold': 4, 'Make Complete': 5};
                        break;
                }
            },
            updateStatus(id) {
                axios.put('/manage/job/status/' + id, {_token: this.token, job: this.job}).then(response => {
                    console.log(response.data);
                    this.currentNumber = response.data[0];
                    this.currentStatusName = response.data[1];
                    this.getDisplayStatus();
                }).catch(error => {
                    console.log(error);
                });
            }


        }
    }
</script>

<style scoped>

</style>