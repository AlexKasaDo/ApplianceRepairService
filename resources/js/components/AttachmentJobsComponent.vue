<template>
    <div class="card mb-3" v-on:keyup.esc="showModal = null">
        <div class="card-header">
            <div class="row">
                <div class="text-left col-6">
                    <b>Attachments</b>
                </div>
                <div class="text-right col-6">
                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Add Attachments
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body row row-cols-1 row-cols-md-3">
            <div class="col-1 mb-4" v-for="(item, index) in this.attaches" :key="item.id" :index="index">
                <div class="card h-80">
                    <template v-if="other.includes(item.type)">
                        <img :src="'/images/attachment/file.svg'" class="card-img-top" alt="..." width="10"
                             height="80">
                    </template>
                    <template v-else-if="docFile.includes(item.type)">
                        <img :src="'/images/attachment/'+ item.type +'.svg'" class="card-img-top" alt="..." width="10"
                             height="80">
                    </template>
                    <template v-else>
                        <button @click="showModal=item.id">
                            <img :src="'/storage/' + item.path" class="card-img-top" alt="..." width="10"
                                 height="80">
                        </button>
                        <template v-if="showModal == item.id" >
                            <transition name="modal">
                                <div class="modal-mask">
                                    <div class="modal-wrapper">
                                        <div class="modal-container">
                                            <img :class="'modal-body'" :src="'/storage/' + item.path"
                                                 class="card-img-top" alt="..." >
                                            <button type="button" class="close modal-default-button"
                                                    @click.esc="showModal=null" >
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </template>
                    </template>

                    <div class="card-body p-1">
                        <span class="d-block">{{item.description}}</span>
                        <div class="btn-group-sm d-flex justify-content-between">
                            <button type="button" @click="deleteImg(item.id)" class="btn p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="15" height="15"
                                     viewBox="0 0 30 30"
                                     style=" fill:#000000;">
                                    <path
                                            d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"></path>
                                </svg>
                            </button>
                            <a :href="'/manage/job/attachment/download/' + item.id" class="btn p-0 ">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="25" height="25"
                                     viewBox="0 0 80 80"
                                     style=" fill:#000000;">
                                    <path
                                            d="M 40 13 C 32.082031 13 25.242188 18.46875 23.457031 26.109375 C 18.585938 26.734375 14.597656 30.265625 13.386719 35.015625 C 5.949219 35.335938 0 41.484375 0 49 C 0 56.71875 6.28125 63 14 63 L 30.550781 63 L 28.550781 61 L 14 61 C 7.382813 61 2 55.617188 2 49 C 2 42.386719 7.378906 37 14.019531 37 L 14.027344 37 L 15.019531 37.023438 L 15.023438 37 C 15.566406 36.984375 16 36.542969 16 36 C 16 35.621094 15.785156 35.273438 15.441406 35.105469 C 16.632813 31.15625 20.148438 28.304688 24.347656 28.035156 L 24.925781 28 C 24.925781 28 24.929688 28 24.929688 28 C 24.953125 28 24.976563 28 25 28 C 25.550781 28 26 27.550781 26 27 C 26 26.652344 25.816406 26.328125 25.519531 26.144531 C 27.246094 19.628906 33.164063 15 40 15 C 46.199219 15 51.835938 18.90625 54.027344 24.722656 L 54.03125 24.746094 C 54.011719 24.828125 54 24.914063 54 25 C 54 25.550781 54.449219 26 55 26 C 55.472656 26 55.882813 25.664063 55.980469 25.203125 C 56.664063 25.082031 57.34375 25 58 25 C 64.617188 25 70 30.382813 70 37 C 70 37.996094 69.863281 39.023438 69.59375 40.058594 L 69.328125 41.046875 L 70.328125 41.28125 C 74.84375 42.359375 78 46.355469 78 51 C 78 56.515625 73.515625 61 68 61 L 51.46875 61 L 49.46875 63 L 68 63 C 74.617188 63 80 57.617188 80 51 C 80 45.761719 76.652344 41.207031 71.746094 39.609375 C 71.914063 38.730469 72 37.855469 72 37 C 72 29.28125 65.71875 23 58 23 C 57.207031 23 56.394531 23.074219 55.574219 23.222656 C 52.894531 17.074219 46.738281 13 40 13 Z M 29 26 C 28.449219 26 28 26.449219 28 27 C 28 27.550781 28.449219 28 29 28 C 29.550781 28 30 27.550781 30 27 C 30 26.449219 29.550781 26 29 26 Z M 33 28 C 32.449219 28 32 28.449219 32 29 C 32 29.550781 32.449219 30 33 30 C 33.550781 30 34 29.550781 34 29 C 34 28.449219 33.550781 28 33 28 Z M 56 28 C 55.449219 28 55 28.449219 55 29 C 55 29.550781 55.449219 30 56 30 C 56.550781 30 57 29.550781 57 29 C 57 28.449219 56.550781 28 56 28 Z M 36 31 C 35.449219 31 35 31.449219 35 32 C 35 32.550781 35.449219 33 36 33 C 36.550781 33 37 32.550781 37 32 C 37 31.449219 36.550781 31 36 31 Z M 56 32 C 55.449219 32 55 32.449219 55 33 C 55 33.550781 55.449219 34 56 34 C 56.550781 34 57 33.550781 57 33 C 57 32.449219 56.550781 32 56 32 Z M 19 35 C 18.449219 35 18 35.449219 18 36 C 18 36.550781 18.449219 37 19 37 C 19.550781 37 20 36.550781 20 36 C 20 35.449219 19.550781 35 19 35 Z M 23 37 C 22.449219 37 22 37.449219 22 38 C 22 38.550781 22.449219 39 23 39 C 23.550781 39 24 38.550781 24 38 C 24 37.449219 23.550781 37 23 37 Z M 26 40 C 25.449219 40 25 40.449219 25 41 C 25 41.550781 25.449219 42 26 42 C 26.550781 42 27 41.550781 27 41 C 27 40.449219 26.550781 40 26 40 Z M 36 41 L 36 54 L 27.585938 54 L 40 66.414063 L 52.414063 54 L 44 54 L 44 41 Z M 38 43 L 42 43 L 42 56 L 47.585938 56 L 40 63.585938 L 32.414063 56 L 38 56 Z M 69 43 C 68.449219 43 68 43.449219 68 44 C 68 44.550781 68.449219 45 69 45 C 69.550781 45 70 44.550781 70 44 C 70 43.449219 69.550781 43 69 43 Z M 67 46 C 66.449219 46 66 46.449219 66 47 C 66 47.550781 66.449219 48 67 48 C 67.550781 48 68 47.550781 68 47 C 68 46.449219 67.550781 46 67 46 Z"></path>
                                </svg>
                            </a>
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Attachment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input"
                                           id="customFile"
                                           @change="onAttachmentChange"
                                    >
                                    <label class="custom-file-label" for="customFile">{{attachment.name}}</label>

                                </div>

                                <span class="invalid-feedback d-block" role="alert" v-if="this.err">
                                        <strong>{{ this.err[0]}}</strong>
                                </span>
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
                attachment: [],
                err: '',
                docFile: ['doc', 'csv', 'xlsx', 'xls', 'docx', 'txt', 'pdf', 'zip', 'rar'],
                other: ['ppt', 'odt', 'ods', 'odp'],
                showModal: null,
            }
        },
        mounted() {
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
                        this.name = null;
                        this.attachment = [];
                    }).catch(error => {
                    this.err = error.response.data.errors.extension;
                });
                this.err = '';
            },
            onAttachmentChange(e) {
                this.attachment = e.target.files[0]
            },

            async getAttachment() {
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
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;

    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 85%;
        margin: 0px 10em;
    }

    .modal-default-button {
        position: fixed;
        z-index: 9999;
        top: 3%;
        right: 3%;
    }

</style>
