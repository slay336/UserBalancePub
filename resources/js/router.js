import vueRouter from "vue-router";
import Vue from "vue";
import Index from "./views/Index";
import Operations from "./views/Operations";
import Login from "./views/Login";

Vue.use(vueRouter);

const routes = [
    {path: "/", component: Index},
    {path: "/operations", component: Operations},
    {path: "/login", component: Login}
];

export default new vueRouter({
    mode: "history",
    routes
});