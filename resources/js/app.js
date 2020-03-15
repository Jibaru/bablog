require('./bootstrap');
window.Vue = require('vue');

Vue.component(
    'app-home',
    require('./views/home/AppHome.vue').default
);

const app = new Vue({
    el: '#app'
});