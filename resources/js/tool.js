Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-blogify-tool',
            path: '/nova-blogify-tool',
            component: require('./components/Tool'),
        },
        {
            name: 'index-image-upload-preview',
            component: require('./components/IndexField'),
        },
        {
            name: 'detail-image-upload-preview',
            component: require('./components/DetailField'),
        },
        {
            name: 'form-image-upload-preview',
            component: require('./components/FormField'),
        },
    ]);
});
