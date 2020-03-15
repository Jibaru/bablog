
export default [

    {
        path: '/',
        component: require('../views/home/AppHome').default,
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
                    route: '/tecnologia/posts'
                }
            },
            {
                path: '/tecnologia/posts/:id',
                component: require('../views/posts/AppPost').default,
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
                    route: '/desarrollo/posts'
                }
            },
            {
                path: '/desarrollo/posts/:id',
                component: require('../views/posts/AppPost').default,
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
                    route: '/aprendizaje/posts'
                }
            },
            {
                path: '/aprendizaje/posts/:id',
                component: require('../views/posts/AppPost').default,
            }
        ]
    },
    {
        path: '/posts',
        component: require('../views/posts/AppPost').default,
        props: true
    },

]
