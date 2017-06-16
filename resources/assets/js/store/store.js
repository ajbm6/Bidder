import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

// Import modules
import categories from './modules/categories';
import regions from './modules/regions';
import modal from './modules/modal';
import auth from './modules/auth';
import user from './modules/user';
import serviesFilter from './modules/servicesFilter';
import service from './modules/service';
import notifications from './modules/notifications';

export default new Vuex.Store({
	modules: {
		categories,
		regions,
		modal,
		auth,
		user,
		serviesFilter,
		service,
		notifications
	}
});