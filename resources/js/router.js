import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import PostsComponent from './pages/PostsComponent';
import SinglePostComponent from './pages/SinglePostComponent';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            meta: {nome: 'Tua Mamma'},
            component: HomeComponent
        },
        {
            path: '/posts',
            name: 'posts',
            component: PostsComponent
        },
        {
            path: '/posts/:slug',
            name: 'single-post',
            component: SinglePostComponent
        },
    ]
});

export default router;