
<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';



    export default {

        props:[
            'urldatauser',
            'urldataeventtype',
            'token',
            'id',
        ],
        components: { DatePicker },


        data: function () {
            return {
                is_add: false,
                edit: '',
                editable: null,
                text:null,
                start_date: null,
                end_date: null,
                status:null,
                assigned:null,
            }
        },
        mounted() {

        },
        methods: {
            async getEvent() {

            },

            addEvent(){

                axios.post('/api/events',{
                    start_date:this.start_date,
                    end_date:this.end_date,
                    text:this.text,
                    type_id:this.status,
                    assigned:this.assigned,
                });
                alert('Successful Adding event')
            },

            submitAdd(){

            },
            remove: function(noteid, index) {

            },

            labelEdit(id){


            }

        },
    }
</script>
<template>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="text-left col-6">
                    <b>Events</b>
                </div>
                <div class="text-right col-6">
                    <button v-on:click="is_add = true" class="btn btn-sm">
                        Add Event
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <template v-if="is_add">



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
                            <td  class="no-border" colspan="4" ><button type="button" @click="is_add = false" class="btn">Cancel</button></td>
                        </tr>

                        </tbody>
                    </table>
                </form>



            </template>
            <ul id="note-list" class="list-group list-group-flush">
                <li class="list-group-item" v-for="(item ,index) in  data" :key="item.id"
                    :index="index">
                    <div class="row">
                        <div class="text-left col-9">
                            <p><small>{{item.created_at}}</small> by <b>{{item.user.name}} </b></p>
                            <p class="text"> {{ item.text}}  </p>
                            <template v-if="editable == item.id">
                                <textarea  v-model="edit = item.text" class="form-control"></textarea>
                                <div class="form-group m-1">
                                    <button type="button" class="btn btn-dark" @click="labelEdit(item.id)">Save</button>
                                    <button type="button" class="btn btn-success" @click="editable=null">Cancel</button>
                                </div>
                            </template>




                        </div>
                        <div class="text-right col-3">
                            <button class="btn update-note"  type="button" @click="editable=item.id">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                     viewBox="0 0 24 24">
                                    <path
                                            d="M4.765 20.467l-1.328 2.443s-1.649.425-2.682 1.09l-.258-.257 1.237-1.237c.108-.109.249-.178.401-.196.084-.011.166-.048.23-.113.155-.155.155-.407 0-.562s-.407-.155-.562 0c-.065.065-.103.146-.113.23-.019.152-.088.293-.196.402l-1.237 1.237-.257-.258c.672-1.044 1.09-2.682 1.09-2.682l2.443-1.329 1.232 1.232zm18.923-18.3c.209-.246.312-.549.312-.851 0-.726-.589-1.316-1.316-1.316-.302 0-.604.103-.851.312 0 0-12.252 9.474-14.236 11.458-1.383 1.383-1.677 2.673-3.49 6.327l1.795 1.796c3.425-1.699 4.857-2.021 6.327-3.49 1.982-1.979 11.459-14.236 11.459-14.236z"/>
                                </svg>
                            </button>
                            <button @click="remove(item.id, index)" class="btn">
                                <svg  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                      width="14" height="14"
                                      viewBox="0 0 24 24"
                                      style=" fill:#000000;">
                                    <path
                                            d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

