export const user = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/users/home/home.vue'),
    meta: {view: 'userView'}
  },

  {
    path: '/cart',
    name: 'cart',
    component: () => import('@/views/users/cart/cart.vue'),
    meta: {view: 'userView'}
  },

  {
    path: '/order',
    name: 'order',
    component: () => import('@/views/users/order/order.vue'),
    meta: {view: 'userView'}
  },
];
