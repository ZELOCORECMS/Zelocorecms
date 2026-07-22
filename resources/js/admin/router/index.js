import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/admin/login',
        name: 'Login',
        component: () => import('../views/Login.vue'),
    },
    {
        path: '/admin',
        component: () => import('../views/DashboardLayout.vue'),
        children: [
            {
                path: '',
                name: 'Dashboard',
                component: () => import('../views/Dashboard.vue'),
            },
            {
                path: 'content-types',
                name: 'ContentTypes',
                component: () => import('../views/ContentTypeList.vue'),
            },
            {
                path: 'themes',
                name: 'ThemeList',
                component: () => import('../views/ThemeList.vue'),
            },
            {
                path: 'content/:type',
                name: 'ContentList',
                component: () => import('../views/ContentList.vue'),
            },
            {
                path: 'content/:type/create',
                name: 'ContentCreate',
                component: () => import('../views/ContentEdit.vue'),
            },
            {
                path: 'content/:type/:id',
                name: 'ContentEdit',
                component: () => import('../views/ContentEdit.vue'),
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
