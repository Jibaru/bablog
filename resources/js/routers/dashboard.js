
export default [

    {
        path: '/',
        component: require('../views/home/AppHomeAdministrator').default,
        props: true,
    },
    {
        path: '/usuarios',
        component: require('../views/users/AppUser').default,
        props: true,
    },
    {
        path: '/roles',
        component: require('../views/roles/AppRole').default,
        props: true,
    },


]
