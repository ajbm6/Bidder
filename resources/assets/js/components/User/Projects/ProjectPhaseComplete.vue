<template>
	<div class="project_phase_complete-component">
		<section class="white-contentSection">
			<header class="white-contentSection-header">
				<h3>Projektet är färdigt!</h3>
			</header>
			<div class="white-contentSection-content">
				<p>Hur skötte sig {{ other.username }}?</p>
				<p>
					Lämna ett omdöme om hur du tyckte projektet gick. Omdöme kommer att hjälpa dig och 
					övriga användare i framtiden att kunna välja rätt samarbetspartner för framtida projekt.
				</p>
				<p>{{ other.username }} kommer även att att lämna ett omdöme om dig.</p>
			</div>
			<div class="gray-contentSection-content">
				<app-leave-review 
					:forUser="other.id" 
					:forProject="project.id" 
					:submitted="submitted"
					@submitted="reviewSubmitted"
				/>
			</div>
		</section>
	</div>
</template>

<script>
	import { mapGetters } from 'vuex';
	import appLeaveReview from "../../Reviews/LeaveReview";

	export default {
		components: {
			appLeaveReview
		},
		computed: {
			...mapGetters({
				project: 'userProjectDetails',
				auth: 'authUser'
			}),
			me() {
				return this.project.users.find(u => u.id === this.auth.id);
			},	
			other() {
				return this.project.users.find(u => u.id !== this.auth.id);
			},
			submitted() {
				return !!this.me.pivot.review;
			}
		},
		methods: {
			reviewSubmitted({review, history}) {
				this.$store.dispatch('reviewSubmitted', {
					user: this.me,
					review,
					history
				});
				this.$store.dispatch('showNotification', {
					type: 'success', 
					msg: 'Du har nu lämnat ett omdöme för projektet. Tack så mycket!'
				});
			}
		}
	}
</script>