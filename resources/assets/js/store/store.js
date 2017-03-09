import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

// Import modules
import categories from './modules/categories';
import regions from './modules/regions';
import modal from './modules/modal';
import auth from './modules/auth';

export default new Vuex.Store({
	modules: {
		categories,
		regions,
		modal,
		auth
	}
});