
require('./bootstrap');

import Vue from "vue"
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('denuncia-component', require('./components/DenunciaComponent.vue').default);


const app = new Vue({
    el: '#app',
});
