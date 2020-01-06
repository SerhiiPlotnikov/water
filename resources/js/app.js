require('./bootstrap');

import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

window.Vue = require('vue');
window.$ = window.jQuery = require('jquery');

Vue.use(BootstrapVue);
Vue.component('users', require('./components/Users.vue').default);
Vue.component('user', require('./components/User.vue').default);
Vue.component('creating-form', require('./components/CreatingForm').default);
Vue.component('editing-form', require('./components/EditingForm').default);


const app = new Vue({
    el: '#app'
});
