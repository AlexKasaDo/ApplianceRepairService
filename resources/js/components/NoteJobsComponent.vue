<template>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="text-left col-6">
                    <b>Notes</b>
                </div>
                <div class="text-right col-6">
                    <button v-on:click="is_add = true" class="btn btn-sm">
                        Add Note
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <template v-if="is_add">
                <form @submit.prevent="submitAdd" class="form-group">
                    <textarea class="form-control" v-model="textNote"/>
                    <div class="form-group m-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" @click="is_add = false" class="btn">Cancel</button>
                    </div>
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

<script>
    export default {
        name: "NoteJobsComponent",
        props: ['token', 'id'],
        data: function () {
            return {
                data: [],
                is_add: false,
                textNote: '',
                edit: '',
                editable: null,
            }
        },
        mounted() {
            this.getNote();

        },
        methods: {
            async getNote() {
                 axios.get('/manage/jobs/note/'+ this.id).then((response) => {
                     this.data = response.data;
                 }).catch(error => console.log(error));
            },

            submitAdd(){
                let formData = new FormData();
                formData.append('_token',this.token);
                formData.append('text', this.textNote);

                axios.post('/manage/jobs/note/'+ this.id, formData).then(response => {
                    this.data = response.data;
                    this.is_add = false;
                    this.textNote = '';
                }).catch(error => console.log(error));
            },
            remove: function(noteid, index) {
                axios.delete('/manage/jobs/note/'+ noteid).then(res => {
                    this.data.splice(index, 1);
                }).catch(error => console.log(error));
            },

            labelEdit(id){

                let formData = new FormData();
                formData.append('_token',this.token);
                formData.append('text', this.edit);
                axios.put('/manage/jobs/note/'+ id, { _token: this.token, text: this.edit }).then(response => {

                    this.editable = null;

                }).catch(error => console.log(error));

            }

        },
    }
</script>

