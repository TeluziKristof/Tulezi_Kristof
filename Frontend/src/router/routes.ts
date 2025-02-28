import { RouteRecordRaw } from "vue-router";

const routes: RouteRecordRaw[] = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/RolunkPage.vue") }],
  },
  {
    path: "/hirdetesek/kartyak",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/HirdetesKartyakPage.vue") }],
  },

  {
    path: "/hirdetesek/tabla",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/HirdetesTablaPage.vue") }],
  },

  {
    path: "/hirdetesfeladas",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/HirdetesFelvetelPage.vue") }],
  },
  {
    path: "/egyedi/:id",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/egyediPage.vue") }],
    props: true,
  },
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFoundPage.vue"),
  },
];

export default routes;
