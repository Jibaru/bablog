
export default [

    {
        path: '/',
        component: require('../views/home/AppHome').default,
        props: true
    },
    { path: '*', redirect: '/' },
    {
        path: '/login',
        component: require('../views/login/AppLogin').default,
        props: true
    },
    {
        path: '/tecnologia',
        component: require('../views/categories/AppCategory').default,
        props: {
            title: 'TECNOLOGÍA'
        },
        children: [
            {
                path: '/',
                component: require('../views/posts/ListPost').default,
                props: {
                    route: '/posts',
                    category: '1'
                }
            },
            {
                path: '/tecnologia/posts/:id',
                component: require('../views/posts/Post').default,
            }
        ]
    },
    {
        path: '/desarrollo',
        component: require('../views/categories/AppCategory').default,
        props: {
            title: 'DESARROLLO'
        },
        children: [
            {
                path: '/',
                component: require('../views/posts/ListPost').default,
                props: {
                    route: '/posts',
                    category: '2'
                }
            },
            {
                path: '/desarrollo/posts/:id',
                component: require('../views/posts/Post').default,
            }
        ]
    },
    {
        path: '/aprendizaje',
        component: require('../views/categories/AppCategory').default,
        props: {
            title: 'APRENDIZAJE'
        },
        children: [
            {
                path: '/',
                component: require('../views/posts/ListPost').default,
                props: {
                    route: '/posts',
                    category: '3'
                }
            },
            {
                path: '/aprendizaje/posts/:id',
                component: require('../views/posts/Post').default,
            }
        ]
    },
    {
        path: '/posts/:id',
        component: require('../views/posts/AppPost').default,
        props: true
    },

]
