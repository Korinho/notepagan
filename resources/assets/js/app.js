
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component('loginmodal', require('./components/loginModal/loginModal.vue'));
Vue.component('modalinvita', require('./components/modalInvita/modalInvita.vue'));
Vue.component('modalbusqueda', require('./components/modalSearch.vue') );
Vue.component('socialbuttons', require('./components/socialButtons.vue') );
Vue.component('casos', require('./components/casos/casos.vue') );





const app = new Vue({
    el: '#statics'
});



