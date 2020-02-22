require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-requirement', require('./components/SearchRequirement.vue').default);
Vue.component('requirement-list', require('./components/RequirementList.vue').default);

Vue.component('search-customer', require('./components/SearchCustomer.vue').default);
Vue.component('customer-list', require('./components/CustomertList.vue').default);

Vue.component('requirement-to-customer', require('./components/RequirementToCustomer.vue').default);


export const bus = new Vue();
const app = new Vue({
    el: '#app',
});
