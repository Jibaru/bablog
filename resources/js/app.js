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
