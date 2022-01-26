import { createWebHistory, createRouter } from 'vue-router'

import PocketIndex from './views/PocketIndex.vue';
import PocketEdit from './views/PocketEdit.vue';
import PocketExport from './views/PocketExport.vue';

const routes = [
        {
            path: '/',
            name: 'home',
            component: PocketIndex
        },
        {
            path: '/edit',
            name: 'edit',
            component: PocketEdit
        },
        {
            path: '/export',
            name: 'export',
            component: PocketExport
        },
    ]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router