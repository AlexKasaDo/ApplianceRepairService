<template>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="text-left col-6">
                    <b>Attachments</b>
                </div>
                <div class="text-right col-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Attachments
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body row row-cols-1 row-cols-md-3">
            <div class="col-2 mb-4" v-for="item in this.attaches">
                <div class="card h-100">
                    <img :src="'/storage/app/public/' + item.path" class="card-img-top" alt="..." width="100"
                         height="150">
                    <div class="card-body">
                        <div class="btn-group-sm">
                            <button type="button" @click="deleteImg(item.id)" class="btn btn-primary">del</button>
                            <button type="button" @click="download(item.id)" class="btn btn-primary">download</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">

                                <div class="custom-file">
                                    <input type="file"
                                           class="form-control-file"
                                           id="customFile"
                                           @change="onAttachmentChange"
                                    >

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textssss">
                                    Description </label>
                                <textarea id="textssss" type="text" class="form-control"
                                          v-model="name" placeholder="No description">No description</textarea>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AttachmentJobsComponent",
        props: ['id', 'token'],
        data: function () {
            return {
                attaches: [],
                name: null,
                attachment: null,
            }
        },
        mounted() {
            console.log(this.storage);
            this.getAttachment();
        },
        methods: {
            submit() {
                const config = {'content-type': 'multipart/form-data'};
                const formData = new FormData();
                formData.append('description', this.name);
                formData.append('attachment', this.attachment);
                formData.append('_token', this.token);


                axios.post('/manage/job/attachment/' + this.id, formData, config)
                    .then(response => {
                        this.closeModal();
                        this.getAttachment();
                    })
                    .catch(error => console.log(error))
            },
            onAttachmentChange(e) {
                this.attachment = e.target.files[0]
            },

            getAttachment() {
                axios.get('/manage/job/attachment/' + this.id).then((response) => {
                    this.attaches = response.data;
                }).catch(error => console.log(error))
            },

            closeModal() {
                $('#exampleModal').modal('hide');
            },

            deleteImg(id) {
                axios.delete('/manage/job/attachment/' + id).then((response) => this.getAttachment()).catch(error => console.log(error));
            },
            download(id) {
                axios.get('/manage/job/attachment/download/' + id, {'_toke': this.token}).then((response) => this.getAttachment())
                    .catch(error => console.log(error));
            }
        }
    }
</script>

<style scoped>

</style>
