
require('./bootstrap');
//require('./public/js/maps');


window.Vue = require('vue');


window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios').default;





// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('data-form', require('./components/DataForm.vue').default);
Vue.component('scheduler', require('./components/Scheduler.vue').default);
Vue.component('calendar', require('./components/Calendar.vue').default);
Vue.component('resource', require('./components/Resource.vue').default);

Vue.component('events-component', require('./components/EventsJobsComponent.vue').default);


Vue.component('attachment-component', require('./components/AttachmentJobsComponent.vue').default);
Vue.component('note-component', require('./components/NoteJobsComponent.vue').default);
Vue.component('status-job', require('./components/StatusJobComponent').default);



const app = new Vue({
    el: '#app',

});

