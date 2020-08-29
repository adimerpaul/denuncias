
require('./bootstrap');

import Vue from "vue"
import VueSimpleAlert from "vue-simple-alert";


Vue.use(VueSimpleAlert);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
