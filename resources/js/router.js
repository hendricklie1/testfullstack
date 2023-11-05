import {createRouter,createWebHistory} from "vue-router";
import ExampleComponent from './components/ExampleComponent';
import TestComponent from './components/TestComponent';

const routes = [
    {
        path: '/home',
        component: ExampleComponent
    },
    {
        path: '/test',
        component: TestComponent
    }
];

const router = createRouter({
    history: createWebHistory,
    routes
});

export default router;