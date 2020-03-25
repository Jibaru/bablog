
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


]
