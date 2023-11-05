/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import createApp from 'vue';
import router from './router.js';
import AppComponent from './App.vue';

const app = createApp({
    components: {
        AppComponent
    }
});

app.use(router);

app.mount('#app');

//window.Vue = require('vue').default;

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('testing-component',require('./components/TestComponent.vue'));

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
// });

// require('./bootstrap');
// window.Vue = require('vue');

// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

// import VueAxios from 'vue-axios';
// import axios from 'axios';

// import App from './App.vue';
// Vue.use(VueAxios, axios);

// import IndexComponent from './components/posts/Index.vue';
// import CreateComponent from './components/posts/Create.vue';
// import EditComponent from './components/posts/Edit.vue';

// const routes = [
//     {
//         name: 'posts',
//         path: '/',
//         component: IndexComponent
//     },
//     {
//         name: 'create',
//         path: '/create',
//         component: CreateComponent
//     },
//     {
//         name: 'edit',
//         path: '/edit/:id',
//         component: EditComponent
//     }
// ];

// const router = new VueRouter({
//     mode: 'history',
//     routes: routes
// });

// const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
