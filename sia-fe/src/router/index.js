import Vue from "vue";
import VueRouter from "vue-router";

import Home from "@/views/Home";
import IndexMajor from "@/views/major/Index";
import EditMajor from "@/views/major/Edit";
import NewMajor from "@/views/major/New";
import DetailMajor from "@/views/major/Detail";
import IndexStudent from "@/views/student/Index";
import EditStudent from "@/views/student/Edit";
import NewStudent from "@/views/student/New";


Vue.use(VueRouter);

const routes = [
  { path: "/", name: "Home", component: Home },
  { path: "/majors", name: "IndexMajor", component: IndexMajor },
  { path: "/majors/:id/edit", name: "EditMajor", component: EditMajor },
  { path: "/majors/new", name: "NewMajor", component: NewMajor },
  {path : '/majors/:id/detail', name : 'DetailMajor', component : DetailMajor},
  {path : '/students', name : 'IndexStudent', component : IndexStudent},
  {path : '/students/:id/edit', name : 'EditStudent', component : EditStudent},
  {path : '/students/new', name : 'NewStudent', component : NewStudent}
 
];

const router = new VueRouter({
  routes: routes // short for `routes: routes`
});

export default router;
