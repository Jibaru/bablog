
export default [

    {
        path: '/',
        component: require('../views/web/home/AppHomeAdministrator').default,
        props: true,
    },
    {
        path: '/usuarios',
        component: require('../views/administrator/users/AppUser').default,
        props: true,
    },
    {
        path: '/roles',
        component: require('../views/administrator/roles/AppRole').default,
        props: true,
    },
    {
        path: '/categorias',
        component: require('../views/administrator/categories/AppCategory').default,
        props: true,
    },
    {
        path: '/archivos',
        component: require('../views/administrator/files/AppFile').default,
        props: true,
    },
    {
        path: '/posts',
        component: require('../views/administrator/posts/AppPost').default,
        props: true,
    },

]
