<template>
	<div class="my_invoices-component">
		
		<section class="white-contentSection">
			<header class="white-contentSection-header">
				<h3>Betalningar</h3>
			</header>
			<div class="white-contentSection-content">
				<template v-if="fetched">
					<ul class="items-list" v-if="invoices.length > 0">
						<li class="gray-item clickable" v-for="invoice in invoices" :key="invoice.id" @click="goTo(invoice)">
							<div class="item-content">
								<div class="item-header">Faktura #{{ invoice.id }}</div>
								<div class="item-sub-data">
									<span class="mr5">Totalsumma: {{ filters.currency(invoice.total) }}</span>&bull;
									<span class="ml5">{{ paymentStatus(invoice) }}</span>
								</div>
							</div>
							<div class="item-go-to">
								<i class="icon h_cheveron_right wh15 light-gray"></i>
							</div>
						</li>
					</ul>

					<div class="alert alert-info" v-else>Där finns inga betalningar registrerade på dig ännu.</div>
				</template>

				<app-loading v-else></app-loading>
			</div>
		</section>

	</div>
</template>

<script>
	import { mapGetters } from 'vuex';
	import Model from '../../../includes/Model';

	export default {
		computed: {
			...mapGetters({
				fetched: 'userInvoicesFetched',
			 	invoices: 'userInvoices'
			})
		},
		methods: {
			goTo(invoice) {
				this.$store.commit('SET_USER_INVOICES_FOCUS', invoice.id);
				this.$router.push(`/user/invoices/${invoice.id}`);
			},
			paymentStatus(invoice) {
				let paymentText = invoice.payment ? 'Betalad' : 'Förfaller';
				let paymentDate =  invoice.payment ? moment(invoice.payment.created_at).format('LLL') : moment(invoice.due).format('LL');
				
				return `${paymentText} den ${paymentDate}`
			}
		},
		created() {
			if ( !this.fetched ) {
				new Model('invoices').get()
					.then(response => {
						this.$store.commit('SET_USER_INVOICES', response.data.invoices);
						this.$store.commit('SET_USER_INVOICES_FETCHED', true);
					})
					.catch(error => { console.log(error); });
			}
		}
	}
</script>