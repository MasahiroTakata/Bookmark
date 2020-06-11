require('./bootstrap');

Vue.component('product-search', require('./components/ProductSearchComponent.vue'));
new Vue({ el: '#app' });