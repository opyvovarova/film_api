import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import Films from "@/Pages/Films/Films.vue";
import FilmDetail from "@/Pages/Films/FilmDetail.vue";
import FilmCreate from "@/Pages/Films/FilmCreate.vue";
import FilmEdit from "@/Pages/Films/FilmEdit.vue";
import Actors from "@/Pages/Actors/Actors.vue";
import ActorCreate from "@/Pages/Actors/ActorCreate.vue";
import ActorDetail from "@/Pages/Actors/ActorDetail.vue";
import ActorEdit from "@/Pages/Actors/ActorEdit.vue";

const routes = [
    { path: '/films', component: Films },
    { path: '/films/create', component: FilmCreate },
    { path: '/films/:id', component: FilmDetail },
    { path: '/films/:id/edit', component: FilmEdit },
    { path: '/actors', component: Actors },
    { path: '/actors/create', component: ActorCreate },
    { path: '/actors/:id', component: ActorDetail},
    { path: '/actors/:id/edit', component: ActorEdit },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
