<template>
	<div class="edit_service-component">
		
		<div class="main-area-with-sidebar">
			<div class="main-area">
				<component :is="currentView" @changeView="changeView"></component>
			</div>
			<div class="main-area-sidebar">
				<template v-if="fetched">
					
					<app-service-bids :bids="service.bids" @changeView="changeView" />

					<button class="btn btn-danger full-width is-flex c_c" @click.prevent="removeService" v-if="service.active">
						<i class="icon icon_danger wh20 mr10"></i> Ta bort tjänsten
					</button>
					
				</template>		
			</div>
		</div>

	</div>
</template>

<script>
	import appEditServiceForm from "./EditServiceForm";
	import appViewAllBids from "./ViewAllBids";
	import appServiceBids from "./ServiceBids";
	import Model from '../../../includes/Model';
	import { mapGetters } from 'vuex';

	export default {
		components: {
			appEditServiceForm,
			appViewAllBids,
			appServiceBids
		},
		data() {
			return {
				currentView: 'appEditServiceForm'
			}
		},
		computed: {
			...mapGetters({
				fetched: 'serviceDetailsFetched',
				service: 'serviceDetailsService',
				services: 'userServices'
			})
		},
		methods: {
			changeView({view}) {
				this.currentView = view;
			},
			removeService() {
				this.$store.dispatch('openModal', {
					component: 'confirm',
					data: {
						confirmText: 'Är du säker på att du vill ta bort tjänsten?',
						onConfirm: () => {
							new Model(`user/services/${this.service.id}`).delete()
								.then(response => {
									this.$store.dispatch('showNotification', {
										type: 'success', 
										msg: 'Vi har tagit bort din tjänst.'
									});
									
									// Remove the service from the store
									let services = this.services;
									services.splice(services.findIndex(s => s.id === this.service.id), 1);
									this.$store.commit('SET_USER_SERVICES', services);

									this.$router.push('/user/services');
									this.$store.dispatch('closeModal');
								})
								.catch(error => {
									console.log(error);
								});
						}
					}
				});
			}
		},
		destroyed() {
			this.$store.dispatch('clearServiceDetailsState');
		}
	}
</script>