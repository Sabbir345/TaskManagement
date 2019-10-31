import AdminDashboardApp from './AdminDashboardApp.vue';
import VueRouter from 'vue-router';

window.axios = require('axios');

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'admindashboard',
            component: AdminDashboardApp,
        },
    ]
});