import router from './route';
import Vue from 'vue'
import VueRouter from 'vue-router';

import 'element-ui/lib/theme-chalk/index.css'
import Element from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
Vue.use(Element, {locale})

Vue.use(VueRouter)

new Vue({
    router,
}).$mount('#app');