import VueRouter from 'vue-router'
import Moment from 'moment';
import routes from './routers/index';

require('./bootstrap');
window.Vue = require('vue');
window.moment = Moment;

Vue.component(
    'app-home',
    require('./views/web/home/AppHome.vue').default
);

Vue.component(
    'nav-bar',
    require('./components/Navbar.vue').default
);

Vue.component(
    'footer-bar',
    require('./components/Footerbar.vue').default
);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    scrollBehavior() {
        document.getElementById('app').scrollIntoView();
    }
});

window.eventBus = new Vue;

const app = new Vue({
    router
}).$mount('#app');
