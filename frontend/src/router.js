import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Single from "./views/Single.vue";
import Admin from "./views/Admin.vue";
import BookForm from "./views/BookForm.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/single/:id",
      name: "single",
      component: Single
    },
    {
      path: "/books/delete",
      name: "admin",
      component: Admin
    },
    {
      path: "/books/new",
      name: "bookform",
      component: BookForm
    }
  ]
});
