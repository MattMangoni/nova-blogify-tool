Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-blogify-tool',
            path: '/nova-blogify-tool',
            component: require('./components/Tool'),
        }
    ]);
    Vue.component('index-image-upload-preview', require('./components/IndexField'));
    Vue.component('detail-image-upload-preview', require('./components/DetailField'));
    Vue.component('form-image-upload-preview', require('./components/FormField'));
});
