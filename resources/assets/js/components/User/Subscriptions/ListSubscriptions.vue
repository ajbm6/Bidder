<template>
    <div class="list_subscriptions-component">
        <template v-if="fetched">
            <ul class="items-list mtb20" v-if="subscriptions.length > 0">
                <li class="white-item ptb10lr15" v-for="subscription in subscriptions" :key="subscription.id">
                    <div class="item-content">
                        <div class="item-header" v-text="title(subscription)"></div>
                    </div>
                    <div class="item-go-to">
                        <i class="icon h_delete wh15 danger" @click="remove(subscription.id)"></i>
                    </div>
                </li>
            </ul>

            <div class="alert alert-info" v-else>Du har ännu inga prenumerationer. Skapa din första ovan.</div>
        </template>

        <app-loading v-else></app-loading>	
    </div>
</template>

<script>
    import Model from "../../../includes/Model";
	import { mapGetters } from 'vuex';

    export default {
        computed: {
			...mapGetters({
				fetched: 'subscriptionsFetched',
				subscriptions: 'subscriptions'
			})
		},
		methods: {
			remove(id) {
				new Model(`subscriptions/${id}`).delete()
					.then(response => {
						let subscriptions = this.subscriptions;
						subscriptions.forEach(function(sub, key) {
							if (id == sub.id) {
								subscriptions.splice(key, 1);
								return;
							}
						});
						this.$store.commit('SET_SUBSCRIPTIONS', subscriptions);
						this.$store.dispatch('showNotification', {type: 'success', msg: 'Prenumerationen är borttagen.'});
					})
					.catch(error => { console.log(error); });
			},
			title(sub) {
				let isRegion = sub.region_id ? true : false;
				let locationId = isRegion ? sub.region_id : sub.city_id;
				let location = isRegion ? this.$store.getters.regionById(locationId) : this.$store.getters.cityById(locationId);
				let category = this.$store.getters.categoryById(sub.category_id);

				return category && location ? `${category.name} i ${location.name}` : '';
			}
		},
		created() {
			if ( !this.fetched ) {
				new Model('subscriptions').get()
					.then(response => {
						this.$store.commit('SET_SUBSCRIPTIONS_FETCHED', true);
						this.$store.commit('SET_SUBSCRIPTIONS', response.data.subscriptions);
					})
					.catch(error => { console.log(error); });
			}
		}
    }
</script>
