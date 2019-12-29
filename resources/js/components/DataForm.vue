<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';


    export default {

        props:[
            'urldatauser',
            'urldataeventtype',

        ],
        components: { DatePicker },
        data() {
            return {
                text:null,
                start_date: null,
                end_date: null,
                status:null,
                assigned:null,
            }
        },
        mounted(){

        },


        methods:{
            addEvent(){
                axios.post('/api/events',{
                    start_date:this.start_date,
                    end_date:this.end_date,
                    text:this.text,
                    type_id:this.status,
                    assigned:this.assigned,
                });
                alert('Successful Adding event')
            }
        },

//        methods:{
//            update: function () {
//                console.log(this.urldata);
//
//            }
////            update: function () {
////                axios.get('/manage/jobs/').then((response) => {
////                    console.log(response)
////                    this.urldatauser = response.data
////                })
////
////            }
//        }
    };
</script>

<template>


    <form class="task_form record first"
          accept-charset="UTF-8" @submit.prevent="addEvent()" method="POST">

    <table class="table new-task-table table-block">
        <thead>
        <tr>
            <th style="width: 26.5%">Date</th>
            <th style="width: 28.5%">Description</th>
            <th style="width: 20%">Assigned To </th>
            <th colspan="2" style="">Task Type</th>
        </tr>
        </thead>
        <tbody>
        <tr class="mobile-labeled">
            <td>
                <div class="mobile-table-label visible-xs">Start time</div>

                <div>
                    <date-picker v-model="start_date" type="datetime" :time-picker-options="{
                                    start: '08:30',
                                    step: '00:30',
                                    end: '18:30',
                                  }"
                                 format="hh:mm a" >
            </date-picker>

                </div>


            </td>
            <td>
                <div class="mobile-table-label visible-xs">End time</div>

                <div>
                    <date-picker v-model="end_date" type="datetime" :time-picker-options="{
                                    start: '08:30',
                                    step: '00:30',
                                    end: '18:30',
                                  }"
                                 format="hh:mm a" >
                    </date-picker>

                </div>


            </td>
            <td>
                <div class="mobile-table-label visible-xs">Description</div>
                <textarea class="form-control input-sm" v-model="text"
                          placeholder="Describe the event" cols="40" rows="1" name="text"
                          style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 48px;">

                                    </textarea>
            </td>
            <td>
                <div class="mobile-table-label visible-xs">Assigned to</div>
                <select name="type" v-model="assigned" class="form-control input-sm">

                        <option v-for="url in urldatauser"   v-bind:value="url.id">{{url.name}}</option>

                </select>
            </td>
            <td colspan="2">
                <div class="mobile-table-label visible-xs">Task Type</div>
                <div class="assign-employee-list">
                    <ul class="list-unstyled">
                        <li>
                            <div class="custom-select-form">
                                <select v-model="status"  class="form-control input-sm select-technician">

                                        <option v-for="url in urldataeventtype " v-bind:value="url.id" >{{url.name}}</option>

                                </select>
                            </div>
                        </li>
                    </ul>
                </div>

            </td>
        </tr>
        <tr>
            <td class="no-border" colspan="4">
                <input type="submit" name="commit" value="Add Event"
                       class="potential_recurrable_item btn btn-sm btn-success ">
            </td>
        </tr>

        </tbody>
    </table>
    </form>
</template>