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


/* show file value after file select */
let all = document.querySelectorAll('.custom-file-input');
[].forEach.call(all, function(div) {
div.addEventListener('change',function(e){
    var fileName = document.getElementById(e.target.id).files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
    console.log(e.target.id)
    })
});

  