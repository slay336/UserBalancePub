import vueRouter from "vue-router";
import Vue from "vue";
import Index from "./views/Index";

Vue.use(vueRouter);

const routes = [
    {path: "/", component: Index}
];

export default new vueRouter({
    mode: "history",
    routes
});