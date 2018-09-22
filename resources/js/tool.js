Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-blogify-tool',
            path: '/nova-blogify-tool',
            component: require('./components/Tool'),
        }
    ]);
});
