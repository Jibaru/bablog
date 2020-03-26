
export default [

    {
        path: '/',
        component: require('../views/web/home/AppHome').default,
        props: true
    },
    { path: '*', redirect: '/' },
    {
        path: '/login',
        component: require('../views/web/login/AppLogin').default,
        props: true
    },
    {
        path: '/tecnologia',
        component: require('../views/web/categories/AppCategory').default,
        props: {
            title: 'TECNOLOGÍA'
        },
        children: [
            {
                path: '/',
                component: require('../views/web/posts/ListPost').default,
                props: {
                    route: '/posts',
                    category: '1'
                }
            },
        ]
    },
    {
        path: '/desarrollo',
        component: require('../views/web/categories/AppCategory').default,
        props: {
            title: 'DESARROLLO'
        },
        children: [
            {
                path: '/',
                component: require('../views/web/posts/ListPost').default,
                props: {
                    route: '/posts',
                    category: '2'
                }
            },
        ]
    },
    {
        path: '/aprendizaje',
        component: require('../views/web/categories/AppCategory').default,
        props: {
            title: 'APRENDIZAJE'
        },
        children: [
            {
                path: '/',
                component: require('../views/web/posts/ListPost').default,
                props: {
                    route: '/posts',
                    category: '3'
                }
            },
        ]
    },
    {
        path: '/posts/:id',
        component: require('../views/web/posts/AppPost').default,
        props: true
    },

]
