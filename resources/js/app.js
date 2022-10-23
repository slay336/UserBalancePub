/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import router from './router';
import axios from 'axios';

window.Vue = require('vue').default;
Vue.prototype.$http = axios;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component("v-header", require("./components/Header.vue").default);
Vue.component("v-balance", require("./components/Balance.vue").default);
Vue.component("v-latest-operations", require("./components/LatestOperations.vue").default);
Vue.component("v-user-operations", require("./components/UserOperations.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data() {
        return {
            isLoggedIn: false,
            currentUser: {},
            refreshIntervalMiliseconds: 5000
        };
    },
    methods: {
        checkLoggedIn: function() {
            this.$http.post("/api/login/check")
                .then(res => {
                    this.isLoggedIn = res.data.isLoggedIn == 1;
                    if(this.isLoggedIn) {
                        this.currentUser = {
                            email: res.data.email
                        };
                    } else {
                        this.currentUser = {};
                    }
                })
                .catch(err => {
                    alert(err);
                })
        },
        formatDate: function(timestamp) {
            const date = new Date(timestamp);
            return `${date.getDate().toString().padStart(2, "0")}.` +
                   `${date.getMonth().toString().padStart(2, "0")}.` +
                   `${date.getFullYear()} ` +
                   `${date.getHours().toString().padStart(2, "0")}:` +
                   `${date.getMinutes().toString().padStart(2, "0")}:` +
                   `${date.getSeconds().toString().padStart(2, "0")}`;
        }
    }
});
