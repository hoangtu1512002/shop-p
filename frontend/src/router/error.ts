export const error = [
  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: () => import('@/views/errors/404/404.vue'),
    meta: {view: 'errorView'}
  },
];
