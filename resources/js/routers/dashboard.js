
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


]
