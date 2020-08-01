/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import VueGmaps from 'vue-gmaps'

Vue.use(VueGmaps, {
  key: 'AIzaSyDMzRrJ73ARGeabMX5Qyn6aao8LXYahQNU'
})

window.onload = function () {
    const app = new Vue({
        el: '#app'
    });
}
