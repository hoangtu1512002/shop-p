import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';

import { user } from './user';
import { error } from './error';

import Loader from '@/utils/loader.vue';

const routes: Array<RouteRecordRaw> = [...user, ...error];

const router = createRouter({
  history: createWebHistory(),
  linkExactActiveClass: 'exact-active-link',
  routes,
});


export default router;
