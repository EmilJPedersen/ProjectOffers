require('./bootstrap');

window.Vue = require('vue');

Vue.comments('Create',require('./../components/Client/Create.vue'));

const app = new Vue({
    el: '#app'
});
