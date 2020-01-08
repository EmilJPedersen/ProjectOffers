/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // Client
Vue.component('client-create', require('./components/Client/Create.vue').default);
// Vue.component('client-view', require('./components/Client/view.vue').default);

// Offer
Vue.component('offer-create', require('./components/Offer/Create.vue').default);
// Vue.component('offer-view', require('./components/Offer/view.vue').default);

// Other
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: "#app"
});
