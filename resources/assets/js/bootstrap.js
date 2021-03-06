/**
 * Load in vue
 */
window.Vue = require('vue');

/**
 * Tell vue to use the first-package vue-router
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * Tell Vue to use the social sharing package
 */
let SocialSharing = require('vue-social-sharing');
Vue.use(SocialSharing);

import Meta from 'vue-meta'
Vue.use(Meta)

/**
 * Global Vue components
 */
Vue.component('app-hero', require('./components/Includes/Hero'));
Vue.component('app-loading', require('./components/Includes/Loading'));

/**
 * Filters
 */
import filters from "./includes/filters";
Vue.prototype.filters = filters;

/**
 * Directives
 */
require('./directives/clickoutside');

/**
 *  Load in Moment.js
 */
window.moment = require('moment');
window.moment.locale('sv');

/**
 * Load in Axios HTTP framework.
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = '/api/v1/';
let token = document.head.querySelector('meta[name="csrf-token"]');

if ( token ) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
	console.error('CSRF token not found.');
}

/**
 * Object to handle Twitter bootstrap breakpoints
 */
import Breakpoints from './includes/classes/BootstrapBreakpoints';
window.breakpoints = new Breakpoints;

/**
 * Instanciate Laravel Echo for realtime
 */
import Pusher from 'pusher-js';
import Echo from "laravel-echo";
window.Echo = new Echo({
	broadcaster: 'pusher',
	key: 'c747553af39377b20bf7',
	cluster: 'eu',
	ecrypted: true,
	namespace: 'App.Events'
});