/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('./public/js/maps');


window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/DataForm.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

<<<<<<< HEAD
Vue.component('data-form', require('./components/DataForm.vue').default);
Vue.component('scheduler', require('./components/Scheduler.vue').default);
Vue.component('calendar', require('./components/Calendar.vue').default);
Vue.component('resource', require('./components/Resource.vue').default);
=======
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('attachment-component', require('./components/AttachmentJobsComponent.vue').default);
Vue.component('note-component', require('./components/NoteJobsComponent.vue').default);
>>>>>>> 634a0a6c149f357be032096ab45512e1c14ac938

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#attachmentsJobs',
});
