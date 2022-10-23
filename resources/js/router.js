import vueRouter from "vue-router";
import Vue from "vue";
import Index from "./views/Index";
import Operations from "./views/Operations";
import Login from "./views/Login";

Vue.use(vueRouter);

const routes = [
    {path: "/", component: Index, name: "index"},
    {path: "/operations", component: Operations, name: "operations"},
    {path: "/login", component: Login, name: "login"}
];

export default new vueRouter({
    mode: "history",
    routes
});