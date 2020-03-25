import VueRouter from 'vue-router'
import {TweenMax, Power2, TimelineLite} from "gsap";
import routes from "./routers/dashboard";
import * as Alerts from "./utils/alerts";
import JQueryDataTableES from "./translations/jquery-datatable-es";

require('./bootstrap');
require( 'datatables.net' );
require('vue-multiselect');

window.Vue = require('vue');
window.Alerts = Alerts;
window.JQueryDataTableES = JQueryDataTableES;


Vue.use(VueRouter);

Vue.component(
    'app-administrator',
    require('./views/administrator/AppAdministrator').default
);

Vue.component(
    'navbar-administrator',
    require('./components/NavBarAdministator').default
);


const router = new VueRouter({

    routes
});

const app = new Vue({
    router: router,
}).$mount('#app-dashboard');;

