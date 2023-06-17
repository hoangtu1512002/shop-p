import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/home/home.vue'),
  },

  {
    path: '/cart',
    name: 'cart',
    component: () => import('@/views/cart/cart.vue'),
  },

  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: () => import('@/views/404/404.vue'),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
